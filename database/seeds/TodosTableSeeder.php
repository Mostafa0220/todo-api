<?php

use Illuminate\Database\Seeder;

class TodosTableSeeder extends Seeder {
    /**
    * Run the database seeds.
    *
    * @return void
    */

    public function run() {
        DB::table( 'todos' )->insert( [
            'name' => 'S.M.A.R.T. goals',
            'user_id' => 1,
            'category_id' => 1,
            'todo_date' => '2020-04-13 12:30:00',
            'description' => "S — Specific. This ensures your goals are well thought out, and not vague or general. So, instead of having a generic goal like “Be a better programmer,” a specific goal will say, “Learn the basic concepts of data structures and algorithms,” which will lead to you becoming a better programmer.<br/>

            M — Measurable. This quantifies your goals so you know exactly where you are with your goals and if you have reached them. For example, instead of saying “Learn React JavaScript framework,” a measurable goal will say, “Create an interface in React that reads JSON response from a third-party API, and displays results and refreshes the results every 30 seconds.”
            <br/>
            A — Attainable. Having ambitious goals are good, but if they are not realistic, then there is no point in having such goals. For example, if you have never had an experience with machine learning algorithms, you can’t expect yourself to write a system that offers a personalized news feed, based on a user’s search history, in a few days.
            <br/>
            R — Relevant. This ensures your goals are relevant to your overall purpose or objective. Just like the saying, “Never lose sight of your purpose,” a goal that is not aligned with the purpose is just an activity.
            <br/>
            T — Timely. This one is pretty straightforward. In Agile software development, we have a concept called “timeboxing,” which is allocating a maximum unit of time for an activity. Similarly, having a timely goal means you have a deadline for when you should complete the goal.",
        ] );
        DB::table( 'todos' )->insert( [
            'name' => 'PhD in Information Systems',
            'user_id' => 1,
            'category_id' => 2,
            'todo_date' => '2025-04-13 12:30:00',
            'description' => "The PhD program in Information Systems is a STEM degree designed to produce scholars who possess a commanding knowledge of the nature of Information Systems, applications of and research on Human - Centered Computing and Information Science, and the supporting technology.

            The program seeks to develop individuals who can expand both the practice and theory of information systems for complex applications and/or organizational environments. It deals with integrated information, computer and communication systems that support and augment individuals and groups in any field of application: management, business, engineering and manufacturing, health and medicine, education, social sciences, arts and humanities, etc.
            
            Many of our Ph.D. graduates in Information Systems currently research and  teach at universities, while others are working for cutting edge leaders in the software industry, such as Microsoft and Avaya.",
        ] );
        DB::table( 'todos' )->insert( [
            'name' => 'Euro tours and travels',
            'user_id' => 1,
            'category_id' => 3,
            'todo_date' => '2020-12-13 12:30:00',
            'description' => "DAY 1<b/>
            Arrive in Paris<b/>
            Arrive at Paris, All Airports ( PAR ) and meet our local representative at the pick-up point.
            Get a hassle-free transfer to your booked hotel and complete the check-in process.
            Have a comfortable stay at your accommodation - Pavillon Villiers Etoile and take some time out to wander around the city to admire its beauty and soak in its culture.<b/>
            DAY 2<b/>
            On this day, go for Paris: River Cruise on the Seine
            Relish a delicious breakfast and proceed for Paris: River Cruise on the Seine.
            <b/>
            Hop onboard for a refreshingly new perspective of central Paris. Take a relaxing 1-hour river cruise of Paris and enjoy unbeatable views of the city's most memorable landmarks.
            <b/>
            Starting at the Eiffel Tower, cruise leisurely on a comfortable boat down the river for a taste of elegant Parisian life. Glide past The Grand Palais, the Louvre, Musée d'Orsay, and Notre Dame Cathedral.
            <b/>
            Enjoy an enlightening river journey with informative audio commentary full of intriguing anecdotes and colorful historical background.
            <b/>
            The Paris cruise goes as far as the Institute of the Arabic World at the Ile Saint-Louis before returning you to the Eiffel Tower, and it's the most relaxing way to sightsee in Paris and is the only way to explore the city free of traffic noise and congestion. 
            Enjoy a comfortable overnight stay.
            DAY 3<b/>
            Day at leisure.<b/>
            Enjoy a scrumptious breakfast and savour the local delicacies. You are free to explore this beautiful city on your own.
            Enjoy a comfortable overnight stay.<b/>
            DAY 4<b/>
            Departure from Paris<b/>
            Enjoy a tasty breakfast and complete the hotel check-out.
            Get a comfortable transfer from your hotel to Paris, Charles De Gaulle Airport in a private Private Sedan.<b/>
            Board your return flight from Paris, Charles De Gaulle Airport and cherish fond memories of your trip.",
        ] );
    }
}
