FROM ubuntu:latest

RUN apt-get update && apt-get install -y curl libcurl4-openssl-dev gcc mysql-client libmysqlclient-dev

COPY test_curl.c /app/test_curl.c

RUN gcc -o /app/test_curl /app/test_curl.c -lcurl `mysql_config --cflags --libs`

CMD ["/app/test_curl"]
