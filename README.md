# dineta-crm
 Dineta.crm

## How to install

1) Clone repository
2) Inside your local repository run command: composer install
3) Create .env file
4) Run php artisan key:generate
5) Add database credentials to .env file


## Blade components

### modals
- selection-of-grid-columns
  - :gridColumns (list of columns)(required)
  - :form (form name from controller for db)(required)

### modules
- tab-list
    - :count (number of tabs)(required)
    - :lang (translations are stores in)(required)

