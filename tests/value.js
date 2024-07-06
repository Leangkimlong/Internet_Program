const { test, expect } = require('@playwright/test');

export const name = "Jake";
export const email = name + "@gmail.com";
export const pass = "12345678";

export const emailMailtrap = "mizterlong95@gmail.com";
export const passMailtrap = "kimlong1871130";

export async function login(page, url, email, pass){
    await page.goto(url);

    await page.getByRole('link', { name: 'Login' }).click();

    await page.getByRole('textbox', { name: 'E-Mail Address' }).fill(email);
    await page.getByRole('textbox', { name: 'Password' }).fill(pass);

    await page.getByRole('button', { name: 'Login' }).click();
}