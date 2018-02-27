## About

Simple application comparing two repositories from github.com. Application also

## RUN

    - docker build -t apicompare .
    - docker run -p 8181:8181 apicompare

## Api

Application also provides REST api for getting Github repositories information:
Swagger is used to document api requests. It can be found under:

    - /app/documentation