

/* flow:

when the customer is clicking around filling his cart, first populate the 'order_first' table.
Once he is ready to ship his order, then we populate the 'Orders' table
Whenever customer adds something to cart, for now, 'order_id' in 'Order_items' stays at the same value (which is 1 higher than the previous order_id value)
Once he is ready to buy, he clicks "buy", then it registers as an order, and is given a date time stamp. 
*/

INSERT INTO Categories VALUES
  (1, "Jacket", "A Jacket. Keeps you warm", "jacket"),
  (2, "Shirt", "Shirts for formal occassions", "shirt"),
  (3, "Pants", "Long pants to cover your legs", "pants"),
  (4, "Shoes", "You need ot wear nice shoes to walk", "shoes"),
  (5, "Tie", "Something that goes around your neck", "tie");

INSERT INTO Colours VALUES
  (1, "Red"),
  (2, "Orange"),
  (3, "Yellow"),
  (4, "Green"),
  (5, "Blue"),
  (6, "Purple"),
  (7, "Black"),
  (8, "White");
  
INSERT INTO Style VALUES
  (1, "Modern"),
  (2, "Retro"),
  (3, "Oldies");

INSERT INTO Products VALUES
  (1, 1, 7, 1, "Original Black", "Formal jacket made off 100% cotton", "jacket_black", 189.99),
  (2, 1, 5, 2, "Scandinavian Blue", "Casual jacket suitable for party", "jacket_blue", 199.99),
  (3, 1, 2, 3, "Vintage Brown", "Retro style jacket made of 100% fur", "jacket_brown", 199.99),
  (4, 1, 3, 2, "Old School Champagne", "Elegant jacket for formal occasion", "jacket_champagne", 219.99),
  (5, 1, 7, 1, "Modern Charcoal", "Gentleman signature jacket for all ages", "jacket_charcoal", 219.99),
  (6, 1, 5, 1, "Navy Blue", "Casual jacket with dark shade of blue", "jacket_navy", 199.99),
  (7, 1, 4, 3, "Olive Green", "Old school jacket for the young at heart", "jacket_olive", 199.99),
  (8, 1, 8, 2, "Elegant White", "White formal jacket for luxury", "jacket_white", 219.99),
  (9, 2, 5, 1, "Pastel Blue", "Cool shirt for any occasion", "shirt_blue", 49.99),
  (10, 2, 4, 3, "Pastel Green", "Hippy shirt with minty shade of green", "shirt_green", 49.99),
  (11, 2, 7, 1, "50 Shades of Grey", "Seductive shirt all girls cannot resist", "shirt_grey", 69.99),
  (12, 2, 1, 1, "Maroon Five", "Romantic shirt that all girls love", "shirt_maroon", 69.99),
  (13, 2, 5, 3, "Cooling Navy", "Cool shirt with a dark shade of blue", "shirt_navy", 59.99),
  (14, 2, 6, 2, "Pastel Pink", "Real men wear pink shirt", "shirt_pink", 49.99),
  (15, 2, 6, 2, "Pastel Purple", "Retro purple shirt to boost confidence", "shirt_purple", 49.99),
  (16, 2, 8, 1, "Plain White", "Original white shirt of a gentleman", "shirt_white", 39.99),
  (17, 3, 7, 1, "Original Black", "Formal pants made of 100% cotton", "pants_black", 69.99),
  (18, 3, 5, 2, "Scandinavian Blue", "Casual pants suitable for party", "pants_blue", 69.99),
  (19, 3, 2, 3, "Vintage Brown", "Retro style pants made of 100% fur", "pants_brown", 79.99),
  (20, 3, 3, 2, "Old School Champagne", "Elegant pants for formal occasion", "pants_champagne", 79.99),
  (21, 3, 7, 1, "Modern Charcoal", "Gentleman signature pants for all ages", "pants_charcoal", 79.99),
  (22, 3, 5, 1, "Navy Blue", "Casual pants with dark shade of blue", "pants_navy", 69.99),
  (23, 3, 4, 3, "Olive Green", "Old school pants for the young at heart", "pants_olive", 79.99),
  (24, 3, 8, 2, "Elegant White", "White formal pants for luxury", "pants_white", 89.99),
  (25, 4, 7, 3, "Black Leather", "Black formal shoes made of 100% leather", "shoes1", 149.99),
  (26, 4, 5, 1, "Blues Clues", "Blue formal shoes made of 100% leather", "shoes2", 149.99),
  (27, 4, 2, 3, "Camel Toe", "Made from 100% camel comfortable for toes", "shoes3", 189.99),
  (28, 4, 2, 2, "Khaki Bukit", "Shiny khaki shoes made of leather", "shoes4", 149.99),
  (29, 4, 5, 1, "Navy Boat Shoe", "Blue casual boat shoes for the young and hipster", "shoes5", 129.99),
  (30, 4, 2, 1, "Brown Boat Shoe", "Casual boat shoes in black and brown", "shoes6", 129.99),
  (31, 4, 2, 2, "Cowboy Boots", "Khaki brown ankle high boots", "shoes7", 149.99),
  (32, 4, 2, 3, "Trainer Boots", "Heavy duty high cut leather boots", "shoes8", 189.99),
  (33, 4, 2, 1, "Casual Brown", "Casual shoes in brown and white", "shoes9", 129.99),
  (34, 5, 7, 2, "Sexy Black", "Floral black necktie made of silk", "necktie_black", 24.99),
  (35, 5, 2, 3, "Striped Brown", "Old school brown necktie with stripes", "necktie_brown", 22.99),
  (36, 5, 3, 2, "Checkered Gold", "Gold checkered necktie with white", "necktie_gold", 22.99),
  (37, 5, 5, 1, "Wavy Blue", "Navy Blue necktie with waves", "necktie_navy", 22.99),
  (38, 5, 1, 2, "Floral Red", "Vintage red necktie with floral pattern", "necktie_red", 24.99),
  (39, 5, 5, 1, "Modern Checkers", "Blue green checkered bowtie", "tie7", 19.99),
  (40, 5, 1, 2, "Elegant Red", "Retro bowtie with red polka dot pattern", "tie8", 19.99),
  (41, 5, 5, 1, "Modern Stripes", "Blue green bowtie with stripes", "tie_blue", 19.99),
  (42, 5, 4, 1, "Abstract Modern", "Blue green bowtie with triangle pattern", "tie_green", 19.99),
  (43, 5, 1, 2, "Curvy Red", "Retro bowtie with curly red pattern", "tie_maroon", 19.99),
  (44, 5, 2, 3, "Floral Orange", "Orange bowtie with floral pattern", "tie_orange", 19.99),
  (45, 5, 1, 2, "Stupid Cupid", "Dark bowtie with red heart pattern", "tie_red", 19.99),
  (46, 5, 2, 3, "Sunny Side Up", "Retro bowtie with orange polka dot pattern", "tie_sunny", 19.99);

INSERT INTO Measurements(torso_length, arm_length, shoulder_width, chest, waist, hips, bicep, pants_length, thigh, neck) VALUES 
  (88, 58, 50, 45, 32, 40, 13, 70, 22, 17),
  (87, 59, 57, 44, 33, 41, 14, 71, 21, 18),
  (86, 57, 55, 46, 33, 47, 18, 72, 24, 19);

INSERT INTO Customers(measure_id, firstname, lastname, phone, email, address, paymentinfo) VALUES
  (1, "Casey", "Duckering", 91234567, "cduck@gmail.com", "Piedmont Avenue 5", "123456789"),
  (2, "Tobin", "Holcomb", 98765432, "tobin@gmail.com", "Foothill Block 49", "123456789"),
  (3, "Johan", "Kok", 99119911, "jkok005@gmail.com", "Tampines Avenue 6", "155263553");

INSERT INTO Delivery_Addresses VALUES
  (1, "NTU Hall 11", "098789"),
  (2, "NUS Eusoff", "654538"),
  (3, "Pioneer and crescent", "878987");


INSERT INTO Orders(customer_id, thedate, delivery_add_id, status, totalcost) VALUES
  (1, '2014-11-22', 1, 'Processing', 213.5),
  (2, '2014-12-08', 2, 'Processing', 333.15),
  (3, '2013-07-18', 3, 'Shipped', 245.78),
  (1, '2016-10-27', 1, 'Processing', 65.5),
  (1, '2016-10-28', 1, 'Pending', 0),
  (2, '2016-10-28', 1, 'Pending', 0);

INSERT INTO Order_items(order_id, product_id, quantity) VALUES
  (2, 2, 4),
  (2, 3, 3),
  (3, 1, 6),
  (4, 1, 5),
  (5, 1, 2),
  (5, 4, 2);






