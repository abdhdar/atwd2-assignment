Avanced Topics in Web Development 2 - Report
=======

---
## Parsing Methods and Tools

Generaily there is some known parsing method that are widely used in parsing files. In Php coding, the most common data that developers encounter will be handling datatype of strings, and other numerical values. The most common type of data file or format that are used is xml or JSON. As these are common, One of the method to parse through these files are XPATH. 

Xpath is short for XML Path language and it defines a way of hwo to select parts of XML  documents to be used in further processing prcoess. Xpath uses syntax that resembles part expressions, which are generalised which make it more poewerful than the simple path expressions in the fiel system. Xpath is used to find nodes, in XSD, and DOM. A such depending on the environment, it is used for conditional such as boolean and results must be returned. 

Another method that can be used is XQuery, which also interact with XML and JSON files. XQuery is a query and functional programming language that transforms collections of structured and unstructered data, which usually in the form of XML, text and other data formats  like JSON. XQuery can be said to be compared with RDMBS as the query language are mostly the same. As databases are relational and usually restricted, Xquery have more benifits such that data is highly variable, can get heterogenous quert results, elements in document are ordered and data can be sparce. 

---  
## XML Parsers: DOM VS STREAM

DOM and Stream parsers are mainly used in this assestment, and both have their advantage and disadvantages. 

DOM is generally an object based parser, which allows a loading of entire XML file into a memory and can be represented in a XML memory tree. As it is inside memory, all the values can be manipualed in an easy way. An example of it that is getting elemnets by their ID or tag name. DOM can aslo be queried using XPATH methods, and can validate documents using XSD schemas. In doing this assestment we are given a large sized data and using an object based parser like DOM would not be the best as it will typically use alot of memory and are slower in processing.

Streaming method, is generally pareses through elements one by one. This method doesnt uses memory like DOM, and once the element is not needed for any type of manipulation, the cursor moves to the next elements. In PHP, the type of stream that are used is pull stream which can be used in different kind of condition statements. This is advantegous in getting the elements, whether to go to the next element or to go back. In the case of this assestment scenario, using streaming parser is better.

As for functionality, DOM are generally more powerful rather than streaming parsers. As DOM are object baed, it is possible to read/write the, which in turn will allows operations such as insert or delete nodes. Streaming parsers on the other hand only allows read, but can be combined with conditions.  

In the case of increased functionlity, we could say that DOM parsers are objectively better, however the parsing method to do operations causes it to use alot of memory resources quickly and can sometime be really intensive. DOM is really dependent heavily on the type of document or processing needs of the project. If the use or development of the project have a tendancy to use small to medium files, using DOM would suffice if the developers need the flexibiltiy of write. But in the case of handling with large datasets, DOM should be avoided, instead use stream process. Large datasets tends to have repetitive values that needed to be separated, to make sense in data management. This is called divide and qonquer technique. As stream parsing allows faster read, the type of managing the required data can be done by simply adding conditions needed. 

In conclusion, The usage of both parsers will depends on the situation or implementation that are needed in the project. Both side shouold be considered based on ease of use, coding preferences, quality control and performance metrics. The general idea is, if read/write is necessary, use DOM, if only read is necessary, use Stream parser.

---
## Chart and Data Visualisation:

There are 2 charting componennts in this assignemnt, which is scatter chart and line-chart. Both used are from google chart which uses JS and the data used are based on the xml files that has been produced. There are some components that are useful in google chart which is interactibility of the users with the chart. As the implemented chart is just basic at its best, there is not many interaction, rather than to show information based on the points that has been put in the chart.
1. Line Chart can be improved in a way that the users can have more option rather than 6 location, which can be increased upon the request.
2. There are more things that can be charted as the timeline used is timestamp(ts), thus coding the part where information can be gained in second(s) format
3. Scatter chart can implement the same features as the line chart, with data up to days can be charted
4. For both Chart, a better styling could be done (restricted due to caching problems)

As of making this assestments, there are few hurdles that has I need more time and knowledge to understand on solving the problem. In my solution, I used AJAX to get the values of JSON from another php file, which processes it upon request. This has been done in the charting for Scatter data. I wanted to do the same for Line-Chart, but the hurdle i faced is that I failed to combine the parsed data which is stored in a different arrays. There are 4 different type of array which carry the value for timestamp, n0, n02 and n0x. The method that I wanted to do is combining all of them and do json_encode, then read the values in the index.php file. But as trial and error goes, there is no working solution and. That is the part where I would improve more.

The Downside of Charting in HTML/CSS/JS is that sometimes there is problem with cache and the chart are not updated eventhought variables has been changes. This leads to ucertainty on the authenticity of the data that has been chaged. Sometimes, they are plotted, and sometimes it not. It is not a pleasent experience to handle with.

---
## Learning Outcome:

In doing this assestment, there are few things that I have noticed.
1. AJAX is a powerful tool in creating a web application that uses the REST functionality and the integration of using SET and GET to pass thorugh value makes it easier to manage data
2. In managing documents, JSON gives more better flexibility in term of managing Arrays as most data that are parsed through in Web development will handle arrays, and JSON gives the ease to use JSON_ENCODE and JSON_DECODE to fully understand whats inside the array itself, and the structure of it.
3. HTML/CSS formating is not really a good representative tool in development process as sometimes in updating the value, there is a caching problems and charting would not show up.
4. Parsing through big data is a challenge and the correct use of different type of parser based on situation will help in improving the output performances

The things I would like to improve more
- [ ]Better understanding on how to format any types of arrays and read based on it
- [ ] Learn more on HTML/CSS/JS styling to represent data better
