/* CREATE DATABASE IF NOT EXISTS recipe_database; */
/* USE recipe_database; */
CREATE TABLE IF NOT EXISTS recipes (
    recipe_id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    category VARCHAR(100),
    -- e.g., starter, main, vegetarian
    ingredients TEXT,
    difficulties TEXT,
    prep_time INT,
    -- Preparation time in minutes
    image_url VARCHAR(255) -- URL to the recipe image
);

CREATE TABLE IF NOT EXISTS recipe_ratings (
    rating_id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    recipe_id INT NOT NULL,
    rating_value INT NOT NULL CHECK (
        rating_value >= 1
        AND rating_value <= 5
    ),
    FOREIGN KEY (recipe_id) REFERENCES recipes(recipe_id),
    FOREIGN KEY (user_id) REFERENCES users(id),
    UNIQUE (user_id, recipe_id)
);

CREATE TABLE IF NOT EXISTS saved_recipes (
    saved_id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    recipe_id INT NOT NULL,
    FOREIGN KEY (user_id) REFERENCES users(id),
    FOREIGN KEY (recipe_id) REFERENCES recipes(recipe_id)
);

USE recipe_database;

INSERT INTO
    recipes (
        name,
        category,
        ingredients,
        difficulties,
        prep_time,
        image_url
    )
VALUES
    (
        'Spaghetti Bolognese',
        'Meat',
        '2 tbsp olive oil, 6 rashers smoked bacon, chopped, 2 large onions, chopped, 3 garlic cloves, crushed, 1kg lean minced beef, 2 large glasses red wine, 2 cans chopped tomatoes, 1 jar marinated mushrooms, 2 bay leaves, 1 tsp dried oregano, 1 tsp dried thyme, Drizzle balsamic vinegar, 12 sun-dried tomatoes, Salt and pepper, Handful of fresh basil leaves, 800g spaghetti, Parmesan cheese to serve',
        'Easy',
        90,
        '/final_project_website/images/Spaghetti_Bolognese.jpg'
    ),
    (
        'Vegan Pancakes',
        'Vegan',
        '125g self-raising flour, 2 tbsp caster sugar, 1 tsp baking powder, Pinch sea salt, 150ml soya/almond milk, ¼ tsp vanilla extract, 4 tsp sunflower oil',
        'Medium',
        15,
        '/final_project_website/images/Vegan_Pancakes.jpg'
    ),
    (
        'Healthy Pizza',
        'Vegetarian',
        'For base: 125g brown flour, pinch salt, 125g plain yoghurt; Topping: 1 pepper, 1 courgette, 1 red onion, 1 tbsp olive oil, ½ tsp chilli flakes, 50g cheese; Tomato sauce: 6 tbsp passata, 1 tsp oregano',
        'Medium',
        25,
        '/final_project_website/images/Healthy_Pizza.jpg'
    ),
    (
        'Easy Lamb Biryani',
        'Meat',
        '5 tbsp vegetable oil, 2 onions, 200g yoghurt, 4 tbsp ginger, 3 tbsp garlic, 1 tsp chilli powder, 5 tsp cumin, 1 tsp cardamom, 4 tsp salt, 1 lime, 30g coriander, 30g mint, 3–4 green chillies, 800g lamb, 4 tbsp cream, 1½ tbsp milk, 1 tsp saffron, 400g basmati rice, 2 tbsp pomegranate seeds',
        'Hard',
        90,
        '/final_project_website/images/Easy_Lamb_Biryani.jpg'
    ),
    (
        'Couscous Salad',
        'Vegan',
        '225g couscous, 8 preserved lemons, 180g dried cranberries, 120g pine nuts, 160g pistachio nuts, 125ml olive oil, 60g parsley, 4 garlic cloves, 4 tbsp red wine vinegar, 1 red onion, 1 tsp salt, 80g rocket leaves',
        'Easy',
        15,
        '/final_project_website/images/Couscous_Salad.jpg'
    ),
    (
        'Mango Pie',
        'Vegetarian',
        'Biscuit base: 280g digestive biscuits, 65g sugar, ¼ tsp cardamom, 128g butter, pinch salt; Mango custard filling: 100g sugar, 2 tbsp gelatine, 120ml cream, 115g cream cheese, 850g mango pulp, pinch salt',
        'Hard',
        60,
        '/final_project_website/images/Mango_Pie.jpg'
    );

/* select
    *
from
    recipes;
*/

-- insert recipe_ratings --
CREATE TABLE IF NOT EXISTS recipe_ratings (
    rating_id INT AUTO_INCREMENT PRIMARY KEY,
    recipe_id INT NOT NULL,
    user_id INT NOT NULL,
    rating_value INT NOT NULL CHECK (rating_value >= 1 AND rating_value <= 5),
    FOREIGN KEY (recipe_id) REFERENCES recipes(recipe_id),
    FOREIGN KEY (user_id) REFERENCES users(id)
);

-- sample score
/* INSERT INTO recipe_ratings (recipe_id, user_id, rating_value)
VALUES
    (1, 1, 5),  -- Recipe 1, User 1, Rating 5
    (2, 1, 4),  -- Recipe 2, User 1, Rating 4
    (3, 2, 3),  -- Recipe 3, User 2, Rating 3
    (4, 2, 5),  -- Recipe 4, User 2, Rating 5
    (5, 3, 4),  -- Recipe 5, User 3, Rating 4
    (6, 3, 2);  -- Recipe 6, User 3, Rating 2
*/
