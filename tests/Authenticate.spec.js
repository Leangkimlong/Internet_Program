const { test, expect, describe } = require('@playwright/test');

import { name, pass, email, emailMailtrap, passMailtrap } from './value';

//AUTH001
test('Register new User', async ({ page }) => {
    await page.goto('http://127.0.0.1:8000/');

    await page.getByRole('link', { name: 'Register' }).click();

    await page.getByRole('textbox', { name: 'Name' }).fill(name);
    await page.getByRole('textbox', { name: 'E-Mail Address' }).fill(email);
    await page.getByRole('textbox', { name: 'Password', exact: true }).fill('12345678');
    await page.getByRole('textbox', { name: 'Confirm Password', exact: true }).fill('12345678');

    await page.getByRole('button', { name: 'Register' }).click();

    await expect(page.getByText('You are logged in!')).toBeVisible();
});

// AUTH002
test('Log in User', async ({ page }) => {
    await page.goto('http://127.0.0.1:8000/');

    await page.getByRole('link', { name: 'Login' }).click();

    await page.getByRole('textbox', { name: 'E-Mail Address' }).fill(email);
    await page.getByRole('textbox', { name: 'Password' }).fill('12345678');

    await page.getByRole('button', { name: 'Login' }).click();

    await expect(page.getByText('You are logged in!')).toBeVisible();
});

//AUTH003
// test('Change User Password', async ({page}) =>{
//     // await page.goto('http://127.0.0.1:8000/');

//     // await page.getByRole('link', { name: 'Login' }).click();
//     // await page.getByRole('link', { name: 'Forgot' }).click();

//     // await page.getByRole('textbox', {name: "E-Mail Address"}).fill(email);

//     // await page.getByRole("button", {name: "Send Password"}).click();

//     // const  inputValue = await page.inputValue(`input[name="email"]`);

//     // expect (inputValue).toBe('');
//     // await page.goto("https://mailtrap.io/");
//     await page.goto("https://mailtrap.io/signin");

//     // await page.getByRole("link", {name: "Log in"}).click();

//     // await page.waitForURL("https://mailtrap.io/signin");

//     // await expect(page).toHaveURL("https://mailtrap.io/signin");

//     await page.getByRole("textbox", {name: "Email", exact: true}).fill(email);

//     await page.getByRole(`link`, {name: "Next"}).click();

//     // await page.waitForSelector("div.is-collapsed");
//     await page.waitForTimeout(6000);

//     await page.getByRole("textbox", {name: "Password", exact: true}).fill(randomPassword);

//     await page.locator("[type=submit]").click();

//     await page.waitForTimeout(6000);

//     // await page.waitForURL("https://mailtrap.io/home", "domcontentloaded");
//     // await expect(page).toHaveURL("https://mailtrap.io/home");
    
//     await page.getByRole("link", {name: "E-Commerce", exact: true}).click();

//     await page.getByText("Reset Password Notification").nth(1).click();

//     // await page.waitForLoadState("networkidle",{timeout: 6000});

//     await page.waitForSelector(`a.button.button-primary`)

//     await page.getByRole("link", {name: "Reset Password", exact: true}).click();

//     await page.getByRole("textbox", {name: "Password", exact: true}).fill("12345678");
//     await page.getByRole("textbox", {name: "Confirm Password", exact: true}).fill("12345678");


// });

//AUTH004
test('Log out User', async ({page}) => {
    await page.goto("http://127.0.0.1:8000/");

    await page.getByRole("link", {name: "Login", exact: true}).click();

    await page.getByRole("textbox", {name: "E-Mail Address", exact: true}).fill(email);
    await page.getByRole("textbox", {name: "Password", exact: true}).fill(pass);

    await page.getByRole("button", {name: "Login"}).click();

    await expect(page.getByText("You are logged in!")).toBeVisible();

    await page.getByRole("button", {name: name}).click();
    await page.getByRole("link", {name: "Logout"}).click();

    await expect(page.getByText("Your Application's Landing Page.")).toBeVisible();

})

