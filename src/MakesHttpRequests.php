<?php

namespace Notific\PhpSdk;

use Exception;
use Notific\PhpSdk\Exceptions\FailedActionException;
use Notific\PhpSdk\Exceptions\NotFoundException;
use Notific\PhpSdk\Exceptions\ValidationException;
use Psr\Http\Message\ResponseInterface;

trait MakesHttpRequests
{
    /**
     * @param $uri
     *
     * @return string|void
     */
    protected function get($uri)
    {
        return $this->request('GET', $uri);
    }

    /**
     * @param $uri
     * @param array $payload
     *
     * @return string|void
     */
    protected function post($uri, array $payload = [])
    {
        return $this->request('POST', $uri, $payload);
    }

    /**
     * @param $uri
     * @param array $payload
     *
     * @return string|void
     */
    protected function put($uri, array $payload = [])
    {
        return $this->request('PUT', $uri, $payload);
    }

    /**
     * @param $uri
     * @param array $payload
     *
     * @return string|void
     */
    protected function delete($uri, array $payload = [])
    {
        return $this->request('DELETE', $uri, $payload);
    }

    /**
     * @param string $verb
     * @param string $uri
     * @param array  $payload
     *
     * @return string|void
     */
    protected function request($verb, $uri, array $payload = [])
    {
        $response = $this->client->request($verb, $uri,
            empty($payload) ? [] : ['form_params' => $payload]
        );

        if (substr($response->getStatusCode(), 0, 1) != '2') {
            return $this->handleRequestError($response);
        }

        $responseBody = (string) $response->getBody();

        return json_decode($responseBody, true) ?: $responseBody;
    }

    /**
     * @param ResponseInterface $response
     *
     * @throws Exception
     * @throws FailedActionException
     * @throws NotFoundException
     * @throws ValidationException
     */
    protected function handleRequestError(ResponseInterface $response)
    {
        if ($response->getStatusCode() === 422) {
            throw new ValidationException(json_decode((string) $response->getBody(), true));
        }

        if ($response->getStatusCode() === 404) {
            throw new NotFoundException();
        }

        if ($response->getStatusCode() === 400) {
            throw new FailedActionException((string) $response->getBody());
        }

        throw new Exception((string) $response->getBody());
    }
}
