# Changelog

All notable changes to `notific-php-sdk` will be documented in this file

## v1.0-beta.2 - 2018-09-04

- Added fluent way to send private notifications with or without templates.
    - template($name)->recipients($recipient1, $recipient2, ...)->send()
    - privateNotification($id)->recipients($recipient1, $recipient2, ...)->send()
    - template($name)->recipients([$recipients])->send()
    - privateNotification($id)->recipients([$recipients])->send()
    - template($name)->tags($tag1, $tag2, ...)->send()
    - privateNotification($id)->tags($tag1, $tag2, ...)->send()
    - template($name)->tags([$tags])->send()
    - privateNotification($id)->tags([$tags])->send()

## 0.1.0 - 2018-12-02

- Initial alpha release
