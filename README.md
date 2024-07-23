# Laravel Vue Telegram Uploader

This is a simple web application created with Laravel and Vue.js that allows users to upload files to a Telegram chat.

## Languages/libraries/packages used
- Laravel 11
- Vue.js 3
- Telegram-upload (https://github.com/Nekmo/telegram-upload)
- Laravel Queue
- Tailwind CSS
- FilePond (https://github.com/pqina/filepond, https://github.com/pqina/vue-filepond)

## Instructions
### To install the application
- Clone the repository
- Run `composer install`
- Run `npm install`
- Run `php artisan storage:link`
- Run `php artisan migrate`

### To run the application

- Run the following commands in separate terminals:
  - Run `npm run dev`
  - Run `php artisan serve`
  - Run `php artisan queue:work`

**Note:**
- You need to install and configure Telegram-upload first. Go to it's repository for more information.
- Change the database configuration and the following variables in the `.env` file:
    - `TELEGRAM_CHAT_ID` - Chat ID where the files will be uploaded
    - `TELEGRAM_UPLOAD_PATH_TO_BINARY` - Path to the telegram-upload binary
