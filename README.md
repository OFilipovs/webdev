# Webdev project in OpenCart

## Features developed:

- [x] Filter for categories for admins
- [x] Discount tag for product page
- [x] Script to retrieve order details from the API

## Demo GIFs:

- Category filter:
![categoryFilter](https://user-images.githubusercontent.com/44839765/220382583-453aeadf-8484-400b-ad05-c418e55d95f2.gif)

- Discount tag:
![DiscountTag](https://user-images.githubusercontent.com/44839765/220382796-8097791a-08f4-46f6-be00-a979b9fc6e23.gif)

- Script:
![orderScript](https://user-images.githubusercontent.com/44839765/220382878-bdf3c23e-018f-4dd7-a1ff-186e36248bec.gif)

## How to run the project:

1. Clone the repository - ```https://github.com/OFilipovs/webdev.git```
2. Run ```composer install```
3. Change the file name "config-dist" to "config" inside folders "admin" and "upload"
4. Start local server from folder "upload" - ```php -S localhost:8000```
5. Open the browser and follow OpenCart installation instructions

## How to run the script:

### Prerequisites:

- Generate an API key in OpenCart admin panel - ```System > Users > API```
- Inside API tab add your IP address to the whitelist
- open terminal from the folder where the script is located and use this command - ```php orders.php```

## Tech stack:

- OpenCart 2.3.0.2
- PHP 7.4
- MySQL 8.0
