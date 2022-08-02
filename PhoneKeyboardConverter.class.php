<?php

class PhoneKeyboardConverter{

	/* Wzór klawiatury. Każdy zdefiniowany przycisk zawiera znak i wartość określającą ile następujących po nim znaków można uzyskać. 
	Domyślny wzór to jest ten ze starych telefonów. Można sobie go zmodyfikować. */
	private static $keyboard = [[" ",1],["a",3],["d",3],["g",3],["j",3],["m",3],["p",4],["t",3],["w",4]];

	public static function convertToNumeric(){
		//Uzyskanie argumentów funkcji i przeglądanie ich pętlą
		$text = func_get_args();
		$numeric = [];
		foreach($text as $letter){

			//Zmiana liter na małe, sprawdzanie czy argument jest pojedynczą literą lub spacją, zamiana na kod ASCII
			$letter = strtolower($letter);
			if(!preg_match("/^[a-z]|\x20$/", $letter)){
				return false;
			}
			$letter = ord($letter);

			//Przeglądanie tablicy ze zdefiniowanymi przyciskami. 
			for($i=count(self::$keyboard)-1;$i>=0;$i--){

				//Sprawdzanie czy litera, w kodzie ASCII, jest w danym przycisku
				if($letter-ord(self::$keyboard[$i][0])>=0){
					
					/*Jeżeli jest to odejmujemy wartość w ASCII pierwszej litery w przycisku od znaku podanego w argumencie funkcji.
					Uzyskana w ten sposób wartość oznacza ile razy należy nacisnąć przycisk.*/
					$keysClicked = $letter-ord(self::$keyboard[$i][0])+1;

					//Jeżeli przycisk należy nacisnąć więcej razy niż przewiduje wzór klawiatury, funkcja zwraca false.
					if($keysClicked>(self::$keyboard[$i][1])){
						return false;
					}else{

						//Tworzenie ciągu znaków z sekwencją cyfr
						$numericLetter = "";
						for($j=0;$j<$keysClicked;$j++){
							$numericLetter = $numericLetter.$i+1;
						}

						//Zamiana ciągu znaków na liczbę i zapisanie go w tablicy
						$numeric[] = intval($numericLetter);
						break;
					}
					
				}
			}

			


		}
		return $numeric;

	}

	public static function convertToString(){
		$numeric = func_get_args();
		$text = "";

		foreach($numeric as $letter){
			if(!is_numeric($letter)){
				return false;
			}

			//Zamiana liczby na pojedyncze cyfry
			$letterChars = str_split(strval($letter));

			//Numer naciśniętego przycisku
			$keyboardIndexChar = $letterChars[0];
			$keyboardIndexInt = intval($letterChars[0]);

			/*Walidacja. Funkcja zwraca false, gdy numer naciśniętego przycisku jest mniejszy niż 1, 
			jeżeli przycisk został naciśnięty więcej razy niż przewiduje klawiatura i jeżeli naciśnięte przyciski nie są takie same.*/
			if($keyboardIndexInt<1){
				return false;
			}
			if(count($letterChars)>self::$keyboard[$keyboardIndexInt-1][1]){
				return false;
			}
			foreach($letterChars as $letterChar){
				if($letterChar !== $keyboardIndexChar){
					return false;
				}
			}

			/*Do zmiennej $text zostaje wprowadzony nowy znak. Znak zostaje wygenerowany z wartości ASCII, 
			będący sumą wartości pierwszej litery w przycisku oraz liczby naciśnięć.*/
			$text = $text.chr(ord(self::$keyboard[$keyboardIndexInt-1][0])+(count($letterChars)-1));

		}

		return $text;

	}
}