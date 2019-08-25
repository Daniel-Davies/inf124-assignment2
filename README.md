# inf124

Daniel Davies - daviesdg - 32285633
William Khaine - wkhaine - 34989009

## URL

Please visit the following URL to look at the site:

http://centaurus-1.ics.uci.edu:1025/asst3/

## DB

User: root
Password: t0eX0oqVXwM6GpIu

## Navigation

The URL above will take you to the index page, called "about" for our site. This is where general information about the site can be found.

- The header serves as the main point of navigation
- Click About to be redirected to the home page "about"
- Click Products to be taken to view all of our products.
- Click a product on the Products page (either the image or the table row) to be taken to a "Details" page about that product you clicked on, and where it can be added to the basket.
- Click add to basket to store the selected product in the session and be taken back to the products page
- Click basket to be taken to a list of the products you have selected to order
- Click "order by email" to purchase the products and be taken to a confirmation page

## Fulfilling the requirements

1. The homepage for us was officially the "about page" so this is where we used the two servlets: the first servlet on the about page adds components to the about page before dispatching the request to another servlet, which will display the last 5 items you looked at. So the "about" page holds the information about the last 5 viewed products, created by one servlet, and another servlet will handle drawing the header etc.
2. On the products page, there are clickable table rows that allow you to access a details page. This details page is handled by a servlet that, given a pid from the products page, will display database information about the selected product.
3. This is done on the "Basket" page. The basket page displays all the products that the user ordered in the session, and then has a form for the user to fill out with all required information. Once this form is filled out and submitted, the information about the user and the ordered products are stored in a backend database. The page is then forwared to another servlet which displays a confirmation of the products ordered.
