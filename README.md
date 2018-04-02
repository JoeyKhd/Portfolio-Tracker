## Portfolio Tracker

Since the crypto related websites based on WordPress are getting more and more by the day I decided to create a portfolio tracker which lets the users follow their own positions and view their profit/loss.
The page uses the CoinMarketCap's API to get the current prices, this ensures we always get the latest prices.
All positions are bound to the user's ID in WordPress and saved to the ```wp_portfolio``` table which is being generated automatically.

![PortfolioTracker](https://i.imgur.com/76BFjAr.png)

### Usage

- Copy ```cryptocoins``` folder to root directory of your WordPress installation.
- Copy ```portfolio.php``` to the theme you are using.
- Create a new page and select the Portfolio Tracker as template.
- Voilá, your all set! Let the magic begin!

(Page template example.) ![Select](https://i.imgur.com/dDbudHw.png)

### Demo

Since a demo means more than a 1000 words!
So if you like to see how everything works before downloading please consider visiting: http://demo.khdsoft.com

Use the following credentials:
```username: demo```
```password: demo```
