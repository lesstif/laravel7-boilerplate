## Laravel Boiler Plate

라라벨 7 기반의 boiler plate project 입니다.

## 구성

### packages

- **[laravel-ide-helper](https://github.com/barryvdh/laravel-ide-helper/)**
- **[laravel-debugbar](https://github.com/barryvdh/laravel-debugbar)**

### MAIL

[mailhog](https://github.com/mailhog/MailHog) 를 사용하니 다운받아서 설치하세요. (**[참고자료](https://www.lesstif.com/software-architect/mailhog-smtp-email-server-61906418.html)**)

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
   
## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

