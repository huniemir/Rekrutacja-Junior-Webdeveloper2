var usersArr = [
	{username: 'Jan Kowalski', birthYear: 1983, salary: 4200},
	{username: 'Anna Nowak', birthYear: 1994, salary: 7500},
	{username: 'Jakub Jakubowski', birthYear: 1985, salary: 18000},
	{username: 'Piotr Kozak', birthYear: 2000, salary: 4999},
	{username: 'Marek Sinica', birthYear: 1989, salary: 7200},
	{username: 'Kamila Wiśniewska', birthYear: 1972, salary: 6800}
];

function welcomeUsers(users){
	for(let i=0;i<users.length;i++){
		if(users[i].salary>15000){
			console.log("Witaj, prezesie!")
		}else if(users[i].salary<5000){
			console.log(users[i].username+", szykuj się na podwyżkę!");
		}else{
			let date = new Date();
			let obliczony_wiek_rocznikowy = date.getFullYear()-users[i].birthYear;
			if(obliczony_wiek_rocznikowy%2==0){
				console.log("Witaj "+users[i].username+"! W tym roku kończysz "+obliczony_wiek_rocznikowy+" lat!");
			}else if(obliczony_wiek_rocznikowy%2==1){
				console.log(users[i].username+", jesteś zwolniony!");
			}
		}

	}
}

window.onload = function(){
	welcomeUsers(usersArr);
}