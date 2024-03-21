<?php
$servername="localhost";
$username="root";
$password="";
$dbname="myweb";

$conn = new mysqli($servername,$username,$password, $dbname);

if($conn->connect_error){
    die("Connection failed: ".$conn->connect_error);
}else{
    echo "Connected successfully";
}


// Create events table
$sql_create_table = "CREATE TABLE IF NOT EXISTS events (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255),
    date DATE,
    time TIME,
    image VARCHAR(255),
    location VARCHAR(255),
    organiser VARCHAR(255),
    email VARCHAR(255),
    phone_no VARCHAR(20),
    description TEXT,
    categories VARCHAR(255)
)";

if ($conn->query($sql_create_table) === TRUE) {
    echo "Events table created successfully<br>";

    // Insert event data
    $events = array(
        array(
            'title' => 'Ocean Guardians Beach Cleanup: Santa Monica Edition',
            'date' => '2024-04-20',
            'time' => '09:00:00',
            'image' => 'event-1.jpg', // Image file name
            'location' => 'Santa Monica Beach, California',
            'organiser' => 'Ocean Guardians Foundation',
            'email' => 'OGFco@gmail.com',
            'phone_no' => '+1-555-123-4567',
            'description' => 'Join us for a community-led beach cleanup to help protect our coastal ecosystem. To protect marine life and ecosystems, we will remove waste and debris from the shoreline with the help of local volunteers and environmentalists. We will offer gloves and trash bags. Let us work together to have a positive influence!',
            'categories' => 'Environmental Cleanup, Community Service'
        ),
        // Add other events here
    );

    
    foreach ($events as $event) {
        $sql_insert_event = "INSERT INTO events (title, date, time, image, location, organiser, email, phone_no, description, categories)
        VALUES ('" . $event['title'] . "', '" . $event['date'] . "', '" . $event['time'] . "', '" . $event['image'] . "', '" . $event['location'] . "', '" . $event['organiser'] . "', '" . $event['email'] . "', '" . $event['phone_no'] . "', '" . $event['description'] . "', '" . $event['categories'] . "')";

        if ($conn->query($sql_insert_event) === TRUE) {
            echo <<<HTML
            <div class="card d-flex flex-row justify-content-center align-items-center rounded border shadow overflow-hidden" style="height: 300px">
                <img src="$event[image]" class="card-img-top rounded-0 object-fit-cover" alt="event-1" style="width: 40%" />
                <div class="card-body p-5">
                    <h5 class="card-title">$event[title]</h5>
                    <p class="card-text text-body-tertiary">
                        Date: $event[date] <br />
                        Time: $event[time] <br />
                        Location: $event[location] <br />
                        Organiser: $event[organiser]
                    </p>
                    <div class="d-flex gap-3 pb-4">
                        <div class="border p-1 px-2 rounded"># $event[categories][0]</div>
                        <div class="border p-1 px-2 rounded"># $event[categories][1]</div>
                    </div>
                    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modal-1">See details</button>
                </div>
            </div>
            
            <div class="modal fade" id="modal-1" tabindex="-1" aria-labelledby="modal-1-label" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="card-title">$event[title]</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body d-flex justify-content-evenly">
                            <div class="w-50">
                                <h5 class="fw-semibold">Details</h5>
                                <p class="card-text fs-6 text-body-secondary">
                                    Date: $event[date] <br />
                                    Time: $event[time] <br />
                                    Location: $event[location] <br />
                                    Organiser: $event[organiser] <br>
                                    Email: $event[email] <br />
                                    Phone: $event[phone_no] 
                                </p>
                            </div>
                            <div class="w-50">
                                <h5 class="fw-semibold">Description</h5>
                                <p class="card-text fs-6 text-body-secondary">
                                    $event[description]
                                </p>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary">Sign Up</button>
                        </div>
                    </div>
                </div>
            </div>
            HTML;
        } else {
            echo "Error inserting event data: " . $conn->error;
        }
    }
} else {
    echo "Error creating events table: " . $conn->error;
}

// Close database connection
$conn->close();
?>