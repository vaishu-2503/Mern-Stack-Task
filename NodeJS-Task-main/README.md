# NodeJS Assignment
## 1. `Create API to initialize the database`
### Fetch the JSON from the third party API and initialize the database with seed data. You are free to define your own efficient table / collection structure.

To create an API to initialize the database with the seed data fetched from the given third-party API, you can follow these steps:

1. Set up a Node.js project with your preferred framework (e.g., Express.js).
2. Install the necessary packages for making HTTP requests and interacting with the database (e.g., axios and mongoose).
3. Define a route for the initialization API (e.g., "/initialize-db") and a function to handle the request.
4. In the function, make a GET request to the third-party API using axios to fetch the JSON data.
5. Parse the JSON data and create a new collection/table in your database (e.g., "products") using mongoose.
6. Iterate through the JSON data and insert each product as a new document into the "products" collection/table.
7. Send a response to the client indicating the success or failure of the database initialization.

## 2. `Create an API for statistics`
### - Total sale amount of selected month
### - Total number of sold items of selected month
### - Total number of not sold items of selected month

The task is to create an API that takes a month as input (in the format of a string representing the name of the month), and matches that month against the "dateOfSale" field in a data source (e.g. a database). The API should then calculate and return three statistics related to the sales data for that particular month:

1. Total sale amount of selected month: This statistic should calculate the total value of all sales that took place in the specified month, regardless of the year.

2. Total number of sold items of selected month: This statistic should calculate the total number of items that were sold in the specified month, regardless of the year.

3. Total number of not sold items of selected month: This statistic should calculate the total number of items that were not sold in the specified month, regardless of the year.

For example, if the API is called with "June" as the input month, it should query the data source and return the total sale amount, total number of sold items, and total number of not sold items for the month of June across all years in the data source.

## 3. `Create an API for bar chart`
### The response should contain price range and the number of items in that range for the selected month regardless of the year.
#### - 0 - 100
#### - 101 - 200
#### - 201-300
#### - 301-400
#### - 401-500
#### - 501 - 600
#### - 601-700
#### - 701-800
#### - 801-900
#### - 901-above

The task is to create an API that takes a month as input (in the format of a string representing the name of the month, and matches that month against the "dateOfSale" field in a data source (e.g. a database). The API should then calculate and return a bar chart that shows the price ranges and the number of items in each range for the specified month, regardless of the year.

The price ranges and their corresponding labels are given as follows:

0 - 100\
101 - 200\
201 - 300\
301 - 400\
401 - 500\
501 - 600\
601 - 700\
701 - 800\
801 - 900\
901 - above

The API should query the data source for all items sold in the specified month, regardless of the year, and then group them into the price ranges listed above. For each price range, the API should return the number of items that fall within that range. The response should be structured in such a way that a front-end developer can easily visualize the data as a bar chart.

For example, if the API is called with "September" as the input month, it should query the data source and return a JSON object with ten key-value pairs, each representing a different price range and the number of items sold in that range during September (across all years in the data source). The front-end developer can then use this data to create a bar chart that shows the distribution of item prices for the selected month.

## 4. `Create an API for pie chart`
### Find unique categories and number of items from that category for the selected month regardless of the year.
### For example :
### - X category : 20 (items)
### - Y category : 5 (items)
### - Z category : 3 (items)

The task is to create an API that takes a month as input (in the format of a string representing the name of the month), and matches that month against the "dateOfSale" field in a data source (e.g. a database). The API should then find all unique categories of items sold in that month, regardless of the year, and return the number of items sold in each category.

For example, if the API is called with "April" as the input month, it should query the data source for all items sold in the month of April, regardless of the year, and then identify all unique categories of those items. The API should then return a response in the following format:

X category : 20 (items)\
Y category : 5 (items)\
Z category : 3 (items)

This means that in the month of April, across all years in the data source, there were 20 items sold that belonged to the X category, 5 items sold that belonged to the Y category, and 3 items sold that belonged to the Z category.

The API should be able to handle any input month and return the unique categories and number of items sold in that month, regardless of the year. This information can be useful for tracking which categories are most popular in a given month and can inform inventory management and marketing strategies.

## 5. `Combination responses of APIs`
### Create an API which fetches the data from all the 3 APIs mentioned above, combines the response and sends a final response of the combined JSON.
The task is to create an API that combines the responses of the three APIs mentioned above and sends a final response as a combined JSON object.

The three APIs are:

1. An API that returns the total sale amount, total number of sold items, and total number of not sold items for a selected month, regardless of the year.
2. An API that returns a bar chart of price ranges and the number of items in each range for a selected month, regardless of the year.
3. An API that returns the unique categories and number of items from each category sold in a selected month, regardless of the year.

To create the combined API, the following steps can be followed:
1. Create an endpoint that accepts a month as input (in the format of a string representing the name of the month).
2. Call each of the three APIs with the input month and obtain their respective responses.
3. Combine the responses into a single JSON object that contains all the information from each of the three APIs.
4. Send the combined JSON object as the final response.
The combined JSON object can be structured in any way that is convenient for the front-end developer to consume. It should contain all the information from each of the three APIs, including the total sale amount, total number of sold items, total number of not sold items, the bar chart of price ranges and the number of items in each range, and the unique categories and number of items sold in each category.

This API can be useful for providing a comprehensive view of sales data for a selected month, and can be used to inform business decisions such as inventory management, marketing strategies, and financial planning.
