const fetchPromise = fetch(
    "https://api.adviceslip.com/advice",
  );
  
  console.log(fetchPromise);
  
  fetchPromise.then((response) => {
    const jsonPromise = response.json();
    jsonPromise.then((data) => {
      console.log(data.slip.id);
      console.log(data.slip.advice);
    });
  });
  
  console.log("Started request…");