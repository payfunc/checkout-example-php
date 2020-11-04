# PHP Checkout Example
Example on how to use PayFunc Checkout using PHP.

## Run
This example uses docker. Perform the following steps to get going:

### Clone
```
git clone https://github.com/payfunc/checkout-example-php
cd checkout-example-php
```

### Build
```
docker build -t checkout-example-php .
```

### Run

```
docker run -it --rm  -p 80:80 --name running checkout-example-php
```

### Open
In your browser go to [http://localhost](http://localhost).


## Troubleshooting

To troubleshoot start by looking at the browsers console window for error messages.

### Running Unsecure
For security reasons the PayFunc Checkout does not load when running it over an unencrypted connection except when serving it from the localhost.
