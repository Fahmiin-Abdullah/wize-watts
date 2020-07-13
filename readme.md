# wize-watts
An e-commerce store selling electronic components

### Project details
The project is built on PHP with Laravel and MySQL (Heroku's ClearDB) database. This was an old project from 2018 that was revived as I did not have any DevOps skills during its development phase.

### Instructions for use
1. Sign in as a new user in order to cart items and view order histories.
2. Admin members can access the dashboard area to add new products or categories, check on customer details and orders, and view the mailing list collected over time.
3. Customers can view the shop page and browse through categories present for any items to their liking.

## Final thoughts
1. It has become much easier to deploy applications using Heroku than ever before.
2. Ensure to add the Pocfile and environment variables to Heroku to get the application to work live.
3. Ensure that ClearDB is set up with the DB credentials under environment variable settings.
4. Prepend all incoming requests in production with HTTPS (see AppServiceProvider::boot()).
