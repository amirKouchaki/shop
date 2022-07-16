## Usage

to see this project on your local machine do the following steps.

- Clone the repository with `git clone`
- Copy `.env.example` file to `.env` and edit database credentials there
- Run `composer install`
- Run `php artisan key:generate`
- Create the Database
- Run `php artisan migrate --seed` (it has some seeded data - see below)
- Run `php artisan storage:link`
- The admin credentials are email: "amir@gmail.com" & password: "password"
- You can see the emails of the employees when you log in as admin (the password of all employees is "password")



## About the project

This is an e-commerce website that has admins and employees. Admins can hire and register employees. They can also add products which their employees can sell to customers and they can edit the added products(yet to be implemented).As well as registering employees, they have full access to the list of the employees hired.

As for the employees they can choose from the products that admin has provided and sell them to the customers of their choosing if the product is available in stock. They also have a shopping cart that is saved even if they logout and login again. They can edit the amount of the chosen item(not yet implemented) or delete it in its entirety.if the shopping cart is not empty they can choose the customer and finalize the purchase.The receipt of this transaction is available in the factors page.


## ScreenShots

### Admin

![Screenshot from 2022-07-16 19-03-13](https://user-images.githubusercontent.com/81798641/179359217-7909caf4-5f7c-43d8-aa5c-75e9e20b89ef.png)


![Screenshot from 2022-07-16 19-03-17](https://user-images.githubusercontent.com/81798641/179359246-8e7611c6-e586-4ad3-9868-0e173cc45a6c.png)


![Screenshot from 2022-07-16 19-03-20](https://user-images.githubusercontent.com/81798641/179359259-c7766300-2533-4a4c-8c47-88654eef641b.png)


![Screenshot from 2022-07-16 19-03-26](https://user-images.githubusercontent.com/81798641/179359284-e5492186-7f4d-4c29-a1e6-49a72c096cdd.png)



### Employee

![Screenshot from 2022-07-16 19-05-41](https://user-images.githubusercontent.com/81798641/179359375-0fe9a02c-c0bc-4430-a076-47f0b397a9b0.png)


![Screenshot from 2022-07-16 19-06-34](https://user-images.githubusercontent.com/81798641/179359402-514a1f92-3de5-48b0-a03a-c3bde3076dde.png)


![Screenshot from 2022-07-16 19-06-57](https://user-images.githubusercontent.com/81798641/179359412-f1ffaf18-aca6-4005-a2d6-2a7478ad7c30.png)
