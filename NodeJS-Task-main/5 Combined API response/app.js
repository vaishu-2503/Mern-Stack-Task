// Import required modules
const express = require('express');
const axios = require('axios');
const app = express();

// API endpoints for statistics, bar chart, and pie chart
const statisticsAPI = 'http://127.0.0.1:3000/statistics';
const barChartAPI = 'http://127.0.0.1:3000/bar-chart';
const pieChartAPI = 'http://127.0.0.1:3000/pie-chart';

// Endpoint for combined data
app.get('/combined-data/:month', async (req, res) => {
    const month = req.params.month;
    let combinedData = {};

    try {
        // Fetch data from statistics API
        const statisticsResponse = await axios.get(`${statisticsAPI}/${month}`);
        combinedData.totalSaleAmount = statisticsResponse.data.totalSaleAmount;
        combinedData.totalSoldItems = statisticsResponse.data.totalSoldItems;
        combinedData.totalNotSoldItems = statisticsResponse.data.totalNotSoldItems;

        // Fetch data from bar chart API
        const barChartResponse = await axios.get(`${barChartAPI}/${month}`);
        combinedData.priceRanges = barChartResponse.data.priceRanges;

        // Fetch data from pie chart API
        const pieChartResponse = await axios.get(`${pieChartAPI}/${month}`);
        combinedData.categories = pieChartResponse.data.categories;

        res.send(combinedData);
    } catch (error) {
        console.error(error);
        res.status(500).send('Internal Server Error');
    }
});

// Start server
app.listen(3000, () => console.log('Server running on port 3000'));
