<?php
// Interface defining room booking methods
interface RoomBookingInterface
{
    public function getPrice();
    public function getDescription();
}

// Concrete implementation of the RoomBookingInterface
class BasicRoom implements RoomBookingInterface
{
    public function getPrice()
    {
        return 40; // Base price for a basic room
    }

    public function getDescription()
    {
        return "Room Booking"; // Description for a basic room booking
    }
}

// Abstract decorator class implementing RoomBookingInterface
abstract class RoomDecorator implements RoomBookingInterface
{
    protected $roomBooking;

    public function __construct(RoomBookingInterface $roomBooking)
    {
        $this->roomBooking = $roomBooking;
    }
}

// Concrete decorator adding extra bed to the room
class ExtraBedDecorator extends RoomDecorator
{
    public function getPrice()
    {
        return $this->roomBooking->getPrice() + 15; // Adding extra bed cost to the base price
    }

    public function getDescription()
    {
        return $this->roomBooking->getDescription() . ", with extra bed"; // Appending description
    }
}

// Concrete decorator adding Wi-Fi to the room
class WifiDecorator extends RoomDecorator
{
    public function getPrice()
    {
        return $this->roomBooking->getPrice() + 2; // Adding Wi-Fi cost to the base price
    }

    public function getDescription()
    {
        return $this->roomBooking->getDescription() . ", with Wi-Fi"; // Appending description
    }
}

// Usage
$basicRoom = new BasicRoom(); // Create a basic room
$roomWithExtraBed = new ExtraBedDecorator($basicRoom); // Decorate with extra bed
$roomWithWifiAndExtraBed = new WifiDecorator($roomWithExtraBed); // Decorate with Wi-Fi

echo "Total Price: $" . $roomWithWifiAndExtraBed->getPrice() . PHP_EOL;
echo "Description: " . $roomWithWifiAndExtraBed->getDescription() . PHP_EOL;

/*
   The code demonstrates the Decorator Pattern:

   - RoomBookingInterface defines methods for room pricing and description.
   - BasicRoom is a concrete implementation providing the base price and description for a basic room.
   - RoomDecorator is an abstract decorator class implementing RoomBookingInterface.
   - ExtraBedDecorator and WifiDecorator are concrete decorators adding extra functionalities.
   - Usage shows how decorators can be combined to create a room with both Wi-Fi and an extra bed,
     allowing for dynamic extension of room functionalities.
*/
