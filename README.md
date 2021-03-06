## Laravel Boiler Plate

라라벨 7 기반의 boiler plate project 입니다.

## 구성

### packages

- **[laravel-ide-helper](https://github.com/barryvdh/laravel-ide-helper/)**
- **[laravel-debugbar](https://github.com/barryvdh/laravel-debugbar)**
- **[laravel-frontend-presets](https://github.com/laravel-frontend-presets/tailwindcss)**

### MAIL

[mailhog](https://github.com/mailhog/MailHog) 를 사용하니 다운받아서 설치하세요. (**[참고자료](https://www.lesstif.com/software-architect/mailhog-smtp-email-server-61906418.html)**)

### logging

logging 채널은 daily 이며 120 일간 저장합니다. *artisan* 으로 실행하는 console log 는 *storage/logs/laravel-cli-YYYY-MM-DD.log* 형식으로 저장됩니다.
(**[참고자료](https://www.lesstif.com/php-and-laravel/laravel-log-file-permission-48103448.html)**)

## 설치

1. 저장소 복제

    ```
    git clone 
    ```

1. package install

    ```
   cp .env.example .env
   composer install
    ```

1. DB 등 설정 변경

    ```
   vi .env
    ```
   
1. migration & seeding 

    ```
   php artisan migrate --seed 
    ```

1. ide helper 실행 

    ```
    php artisan ide-helper:generate
    php artisan ide-helper:meta
    php artisan ide-helper:models 
    ```
      
1. optimus 로 prime 생성 

    ```
    php vendor/bin/optimus spark    
    ```   

1. 생성된 prime 을 .env 에 적용 
   
   ```
   OPTIMUS_PRIME=7
   OPTIMUS_INVERSE=11
   OPTIMUS_XOR=13
   ```
   
## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

