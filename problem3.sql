/* This is a tough one, we might have to let go of Bernice. Just kidding...*/

SELECT Employees.employeeID, Employees.firstName, Employees.lastName, Addresses.addressID, Addresses.address, Addresses.provinceID, Addresses.city, Addresses.postalCode, Addresses.movedInDate, Provinces.province FROM Addresses
INNER JOIN Employees ON Addresses.employeeID=Employees.employeeID
INNER JOIN Provinces ON Addresses.provinceID=Provinces.provinceID;