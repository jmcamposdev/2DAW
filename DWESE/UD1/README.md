# Uni1 - Forms and Sessions
In UD1 we have focused on learning:
- Using Forms with GET and POST and the differences between the two.
- Validation of received data to avoid XSS and SQLInjection.
- Use of Sessions to persist data during the whole execution and reloads.
- Reloading the same php to show different data.

**We have done 3 Activities which are:**

## Restaurant - [Demo](https://servidor.jmcampos.dev/1.TareaOnline/1.Restaurante/)

Create a form that shows the menu of the day in a restaurant, you will have to ask for the following data:
1. Table number
2. Name and surname of the waiter who attends to the table.
3. Three first dishes to choose one of them
4. Three second courses to choose one of them
5. Three drinks to choose one of them.
6. Extras such as bread, butter, cigars, you can choose the ones you want.

## Car Shop with Financing - [Demo](https://servidor.jmcampos.dev/1.TareaOnline/2.Coche/)

Form html that calculates a budget with a PHP document, if you choose financing gives rise to another document with html + php that calculates the total of the car + the calculations of the financing.
The form data are:
- Model
- Color
- Type of car
- Doors
- HORSEPOWER

- Engine Type [Diesel, Gasoline, Electric, Hybrid].

Once the form is filled in, you will be redirected to `calculateBudget.php` where it will be done:
- Display the form data
- Ask if you want to finance or not

If you want to Finance it will reload the same php and show a form with two fields:
- Base amounts to pay
- Months of Financing

Once submitted it will show the user the total price of the car and how much to pay per month.

If you do not decide to finance the price of the car is calculated and displayed to the user.

## Gallery - [Demo](https://servidor.jmcampos.dev/1.TareaOnline/3.Galeria/)
In this exercise we must:
- Display all photos in a directory filtering them only by **[jpg, jpeg, png, bmp, gif]**.
- If you click on the photo, open the photo in full size in a separate tab.
- Add a form for the user to allow the upload of their own photos

In this exercise perform the use of:
- **$_SERVER**: To get the address and calculate the address of the photo.
- **file_exists()**: To check that they do not upload duplicate photos.
- **move_uploaded_file()**: To place the uploaded image to the correct directory.
- **getimagesize()**: To check if what you upload is truly an image since if it is not it returns false.

