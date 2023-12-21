<?php

// Define a class representing a double room booking
class doubleRoomBed
{
    // Properties
    public int $price = 40;             // Default price for the room
    public string $description = "Room Booking";  // Default description for the room
    public bool $hasExtraBed = false;   // Flag indicating whether the room has an extra bed
    public bool $hasWifi = false;       // Flag indicating whether the room has Wi-Fi

    // Method to add an extra bed to the room
    public function addExtraBed()
    {
        $this->hasExtraBed = true;
    }

    // Method to add Wi-Fi to the room
    public function addWifi()
    {
        $this->hasWifi = true;
    }

    // Method to calculate the final price of the room considering extra bed and Wi-Fi
    public function getPrice()
    {
        // If the room has an extra bed, add an extra cost
        if ($this->hasExtraBed)
            $this->price += 15;

        // If the room has Wi-Fi, add an extra cost
        if ($this->hasWifi)
            $this->price += 2;

        // Return the total price
        return $this->price;
    }

    // Method to generate a description for the room considering extra bed and Wi-Fi
    public function getDescription()
    {
        // If the room has an extra bed, add it to the description
        if ($this->hasExtraBed)
            $this->description .= ", with extra bed";

        // If the room has Wi-Fi, add it to the description
        if ($this->hasWifi)
            $this->description .= ", with Wi-Fi";

        // Return the final description
        return $this->description;
    }
}

// Create an instance of the doubleRoomBed class
$d = new doubleRoomBed;

// Add an extra bed and Wi-Fi to the room
$d->addExtraBed();
$d->addWifi();

// Display the total price and description of the room
echo "Total Price: $" . $d->getPrice() . PHP_EOL;
echo "Description: " . $d->getDescription() . PHP_EOL;
