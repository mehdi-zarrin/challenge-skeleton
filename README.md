[![Build Status](https://app.travis-ci.com/mehdi-zarrin/geolocation.svg?branch=master)](https://app.travis-ci.com/mehdi-zarrin/geolocation)

# Coordinates resolver


## How to start the project

These are following steps to setup project:

```
cp .env.dist .env
```

then to prepare docker environment just run the following command in the project directory:
```
make
```

As you can see there is a `build passing` badge which means the project is built and tested by travis ci, however, if you want to run the test in your local machine just run the following commands:
```
make test
```
or to run them separately run:
```
make api-test
make integration-test
```

Finally to shutdown the app run:

```
make down 
```

