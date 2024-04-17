let car1 = {
    brand: 'Toyota',
    model: 'Camry',
    year: 2020,
    start: function() {
      console.log('Engine started');
    },
    drive: function(speed) {
      console.log(`Driving at ${speed} km/h`);
    }
  };
  car1.start();
  car1.drive(60);

  let car2 = {
    brand: 'Toyota',
    model: 'Camry',
    year: 2020,
    start() {
      console.log('Engine started');
    },
    drive(speed) {
      console.log(`Driving at ${speed} km/h`);
    }
  };

  car2.start();
  car2.drive(60);
  

  //this keyword
  let person1 = {
    firstName: 'kesavan',
    lastName: 'Vel',
    fullName: function() {
      return this.firstName + ' ' + this.lastName;
    }
  };
  
  console.log(person1.fullName());

  //arrow function
  let person2 = {
    name: 'Kesavan',
    greet: () => {
      console.log(`Hello, my name is ${this.name}`);
    }
  };
  
  person2.greet();