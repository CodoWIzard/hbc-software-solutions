<?php
// Sample product data
$products = [
    [
        'name' => 'Morning Boost Smoothie Bowl',
        'price' => 4.50,
        'calories' => '300 kcal',
        'description' => 'A blend of acai, banana, and mixed berries topped with granola, chia seeds, and coconut flakes.',
        'image_url' => 'assets/images/smoothie-bowl.jpg',
        'category' => 'breakfast'
    ],
    [
        'name' => 'Eggcellent Wrap',
        'price' => 3.50,
        'calories' => '250 kcal',
        'description' => 'Whole-grain wrap filled with scrambled eggs, spinach, and a light yogurt-based sauce.',
        'image_url' => 'assets/images/egg.jpg',
        'category' => 'breakfast'
    ],
    [
        'name' => 'Peanut Butter Power Toast',
        'price' => 2.80,
        'calories' => '220 kcal',
        'description' => 'Whole-grain toast with natural peanut butter and banana slices.',
        'image_url' => 'assets/images/peanut.jpg',
        'category' => 'breakfast'
    ],
    [
        'name' => 'Protein-Packed Bowl',
        'price' => 6.00,
        'calories' => '450 kcal',
        'description' => 'Quinoa, grilled tofu, roasted vegetables, and a tahini dressing.',
        'image_url' => 'assets/images/protein-bowl.jpg',
        'category' => 'lunch'
    ],
    [
        'name' => 'Supergreen Salad',
        'price' => 5.00,
        'calories' => '300 kcal',
        'description' => 'Kale, spinach, avocado, edamame, cucumber, and a lemon-olive oil vinaigrette.',
        'image_url' => 'assets/images/supergreen-salad.jpg',
        'category' => 'lunch'
    ],
    [
        'name' => 'Zesty Chickpea Wrap',
        'price' => 4.50,
        'calories' => '400 kcal',
        'description' => 'Whole-grain wrap with spiced chickpeas, shredded carrots, lettuce, and hummus.',
        'image_url' => 'assets/images/chickpea-wrap.jpg',
        'category' => 'lunch'
    ],
    [
        'name' => 'Sweet Potato Wedges',
        'price' => 3.50,
        'calories' => '250 kcal',
        'description' => 'Oven-baked sweet potato wedges seasoned with paprika and a touch of olive oil.',
        'image_url' => 'assets/images/sweet-potato-wedges.jpg',
        'category' => 'sides'
    ],
    [
        'name' => 'Quinoa Salad Cup',
        'price' => 3.00,
        'calories' => '200 kcal',
        'description' => 'Mini cup of quinoa mixed with cucumber, cherry tomatoes, parsley, and lemon dressing.',
        'image_url' => 'assets/images/quinoa-salad-cup.jpg',
        'category' => 'sides'
    ],
    [
        'name' => 'Mini Veggie Platter',
        'price' => 3.00,
        'calories' => '150 kcal',
        'description' => 'A selection of carrot sticks, celery, cucumber slices, and cherry tomatoes served with a dip of your choice.',
        'image_url' => 'assets/images/veggie-platter.jpg',
        'category' => 'sides'
    ],
    [
        'name' => 'Brown Rice & Edamame Bowl',
        'price' => 3.50,
        'calories' => '300 kcal',
        'description' => 'A small portion of brown rice topped with steamed edamame and a drizzle of soy sauce.',
        'image_url' => 'assets/images/rice.png',
        'category' => 'sides'
    ],
    [
        'name' => 'Roasted Chickpeas (Spicy or Herb)',
        'price' => 2.50,
        'calories' => '180 kcal',
        'description' => 'Crunchy roasted chickpeas with your choice of spicy paprika or herb seasoning.',
        'image_url' => 'assets/images/roasted-chickpeas.jpg',
        'category' => 'snacks'
    ],
    [
        'name' => 'Trail Mix Cup',
        'price' => 2.50,
        'calories' => '200 kcal',
        'description' => 'A mix of nuts, dried fruits, and seeds for an energy boost.',
        'image_url' => 'assets/images/trail-mix.jpg',
        'category' => 'snacks'
    ],
    [
        'name' => 'Zucchini Fries',
        'price' => 3.00,
        'calories' => '180 kcal',
        'description' => 'Baked zucchini sticks coated in a light breadcrumb crust.',
        'image_url' => 'assets/images/Zucchini-Fries.jpg',
        'category' => 'snacks'
    ],
    [
        'name' => 'Classic Hummus',
        'price' => 0.80,
        'calories' => '70 kcal',
        'description' => 'Smooth and creamy classic hummus.',
        'image_url' => 'assets/images/classic-hummus.jpg',
        'category' => 'dips'
    ],
    [
        'name' => 'Avocado Lime Dip',
        'price' => 1.00,
        'calories' => '80 kcal',
        'description' => 'Creamy avocado dip with a hint of lime.',
        'image_url' => 'assets/images/avocado-lime-dip.jpg',
        'category' => 'dips'
    ],
    [
        'name' => 'Greek Yogurt Ranch',
        'price' => 0.70,
        'calories' => '50 kcal',
        'description' => 'Creamy ranch dip made with Greek yogurt.',
        'image_url' => 'assets/images/greek-yogurt-ranch.jpg',
        'category' => 'dips'
    ],
    [
        'name' => 'Spicy Sriracha Mayo',
        'price' => 0.70,
        'calories' => '60 kcal',
        'description' => 'A spicy and creamy mayo dip.',
        'image_url' => 'assets/images/sriracha-mayo.jpg',
        'category' => 'dips'
    ],
    [
        'name' => 'Garlic Tahini Sauce',
        'price' => 0.90,
        'calories' => '90 kcal',
        'description' => 'Rich tahini sauce with garlic flavor.',
        'image_url' => 'assets/images/garlic-tahini.jpg',
        'category' => 'dips'
    ],
    [
        'name' => 'Zesty Tomato Salsa',
        'price' => 0.60,
        'calories' => '20 kcal',
        'description' => 'Fresh and zesty tomato salsa.',
        'image_url' => 'assets/images/zesty-tomato-salsa.jpg',
        'category' => 'dips'
    ],
    [
        'name' => 'Peanut Dipping Sauce',
        'price' => 0.90,
        'calories' => '100 kcal',
        'description' => 'Creamy peanut sauce perfect for dipping.',
        'image_url' => 'assets/images/peanut-dipping-sauce.jpg',
        'category' => 'dips'
    ],
    [
        'name' => 'Berry Blast Smoothie',
        'price' => 3.80,
        'calories' => '140 kcal',
        'description' => 'A creamy blend of strawberries, blueberries, and raspberries with almond milk.',
        'image_url' => 'assets/images/Berry-Blast-Smoothie.jpg',
        'category' => 'drinks'
    ],
    [
        'name' => 'Chia Pudding Cup',
        'price' => 3.00,
        'calories' => '250 kcal',
        'description' => 'Creamy chia pudding made with almond milk and topped with fresh fruit.',
        'image_url' => 'assets/images/chia-pudding.jpg',
        'category' => 'snacks'
    ],
    [
        'name' => 'Baked Falafel Bites (4 pcs)',
        'price' => 3.50,
        'calories' => '220 kcal',
        'description' => 'Baked falafel balls served with a dip of your choice.',
        'image_url' => 'assets/images/falafel-bites.jpg',
        'category' => 'snacks'
    ],
    [
        'name' => 'Mini Whole-Grain Breadsticks',
        'price' => 2.00,
        'calories' => '150 kcal',
        'description' => 'Crisp, wholesome breadsticks perfect for pairing with hummus or salsa.',
        'image_url' => 'assets/images/breadsticks.jpg',
        'category' => 'snacks'
    ],
    [
        'name' => 'Apple & Cinnamon Chips',
        'price' => 2.50,
        'calories' => '100 kcal',
        'description' => 'Baked apple slices lightly dusted with cinnamon.',
        'image_url' => 'assets/images/apple-chips.jpg',
        'category' => 'snacks'
    ],
    [
        'name' => 'Green Glow Smoothie',
        'price' => 3.50,
        'calories' => '120 kcal',
        'description' => 'Spinach, pineapple, cucumber, and coconut water.',
        'image_url' => 'assets/images/green-glow-smoothie.jpg',
        'category' => 'drinks',
    ],
    [
        'name' => 'Iced Matcha Latte', 
        'price' => 3.00,
        'calories' => '90 kcal',
        'description' => 'Lightly sweetened matcha green tea with almond milk.',
        'image_url' => 'assets/images/Ice_matcha.jpg',
        'category' => 'drinks'
    ],
    [
        'name' => 'Fruit-Infused Water',
        'price' => 1.50,
        'calories' => '60 kcal',
        'description' => 'Freshly infused water with a choice of lemon-mint, strawberry-basil, or cucumber-lime.',
        'image_url' => 'assets/images/Fruit-Infused.jpg',
        'category' => 'drinks'
    ],
    [
        'name' => 'Citrus Cooler',
        'price' => 3.00,
        'calories' => '90 kcal',
        'description' => 'A refreshing mix of orange juice, sparkling water, and a hint of lime.',
        'image_url' => 'assets/images/Citrus-Cooler.jpg',
        'category' => 'drinks'
    ],


];