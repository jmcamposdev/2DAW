# Unit 2 - Sessions & Validations

In this unit we will focus on learning:

- Use of Sessions to persist data during the whole execution and reloads.
- Reloading the same php to show different data.
- Validation of received data to avoid XSS and SQLInjection.
- Validate that the user is logged in to access certain pages.

## Car Store with Login and Sessions - [Demo](https://servidor.jmcampos.dev/DWESE/UD2/1.Coche)

In this exercise we will do the same as in the previous exercise but we will add a login page to access the budget
calculation page.
We restrict access to the budget calculation page if the user is not logged in.

The valid keys are:

- User : `admin`
- Password : `admin`

## Cart with Login and Sessions - [Demo](https://servidor.jmcampos.dev/DWESE/UD2/2.Cesta)

In this exercise we focus on the use of sessions to store the products that the user adds to the cart.
We restrict access to the pages if the user don't add the previous products.

- The user can select one plate and if the user select other plate, the previous plate is replaced.
- The user can add extras and this are optionals.
- The extras can be one or more. The user can add one extra or more than one maximum 5.
- When the user select the first plate, second plate and extras or not the user will see the result page.
- The result page will show the plates and extras selected by the user and the total price.
- In the result page you have a button to reset the session and start again.
