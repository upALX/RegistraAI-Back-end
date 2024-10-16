# RegistraAI-Back-end

**Overview**

This is the server side of Registra AÍ app.

🛠️*This project is under development*🛠️

![giphy](https://github.com/upALX/All-Assets/blob/main/construction-little-girl.webp)

---

## Tech stack
![Laravel Lumen](https://img.shields.io/badge/-Lumen-05122A?style=flat&logo=lumen)&nbsp;
![GraphQL](https://img.shields.io/badge/-GraphQL-05122A?style=flat&logo=graphql)&nbsp;
![Lighthouse](https://img.shields.io/badge/-Lighthouse-05122A?style=flat&logo=lighthouse)&nbsp;
![dotenv](https://img.shields.io/badge/-Dotenv-05122A?style=flat&logo=dotenv)&nbsp;
![DOCKER](https://img.shields.io/badge/-Docker-05122A?style=flat&logo=docker)&nbsp;


## How to use 🫁

**All of you need:**
  - docker >= 27.3.1
  - docker compose >= 1.29.2

**You need create and put this env vars on root folder of the app**
```
DB_CONNECTION=pgsql
DB_HOST=postgres
DB_PORT=5432
DB_DATABASE=registraaidb
DB_USERNAME=alx
DB_PASSWORD=9871237645
APP_ENV=local
SESSION_DRIVER=file
SESSION_LIFETIME=120
APP_DEBUG=true
MAIL_MAILER=mailtrap
MAIL_HOST=sandbox.api.mailtrap.io
MAILTRAP_API_KEY=79e2d42d4a17537afe3b854461083462
MAILTRAP_INBOX_ID=3128841
MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS=hello@example.com
MAIL_FROM_NAME=registraai
SESSION_DOMAIN=localhost
```

**1 - Clone this repo:**
```
git clone git@github.com:upALX/RegistraAI-Back-end.git
```
**2 - Build the aplication and run (first time)**
```
docker-coompose up --build
```

**If you stop the app and need to run again, use this:** 

```
docker-compose up
```

## Make your mark :triangular_flag_on_post:   

**If you have any problems with this app or have an idea that contributes, open a [issue](https://github.com/upALX/RegistraAI-Back-end/issues), [pull request](https://github.com/upALX/RegistraAI-Back-end/pulls) or find me on [Linkedin](https://www.linkedin.com/in/alxinc/). Don't forget to give the project a star 🌟 :D**

## License :unlock:

This project is under the [MIT license](https://github.com/upALX/RegistraAI-Back-end/blob/main/LICENSE).

---

**Keep it simple and always remember to look at the stars ✨**
