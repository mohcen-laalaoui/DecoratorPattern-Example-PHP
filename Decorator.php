<?php
interface RoomBookingInterface
{
public function getPrice();
public function getDescription();
}

class BasicRoom implements RoomBookingInterface
{
public function getPrice()
{
return 40;
}

public function getDescription()
{
return "Room Booking";
}
}

abstract class RoomDecorator implements RoomBookingInterface
{
protected $roomBooking;

public function __construct(RoomBookingInterface $roomBooking)
{
$this->roomBooking = $roomBooking;
}
}

class ExtraBedDecorator extends RoomDecorator
{
public function getPrice()
{
return $this->roomBooking->getPrice() + 15;
}

public function getDescription()
{
return $this->roomBooking->getDescription() . ", with extra bed";
}
}

class WifiDecorator extends RoomDecorator
{
public function getPrice()
{
return $this->roomBooking->getPrice() + 2;
}

public function getDescription()
{
return $this->roomBooking->getDescription() . ", with Wi-Fi";
}
}

// Usage
$basicRoom = new BasicRoom();
$roomWithExtraBed = new ExtraBedDecorator($basicRoom);
$roomWithWifiAndExtraBed = new WifiDecorator($roomWithExtraBed);

echo "Total Price: $" . $roomWithWifiAndExtraBed->getPrice() . PHP_EOL;
echo "Description: " . $roomWithWifiAndExtraBed->getDescription() . PHP_EOL;
