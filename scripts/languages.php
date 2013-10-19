<?php
//English
$contLanguage = 'english';

if (!isset($_SESSION['language1'])){
	$_SESSION['language'] = 'english';
	//unset($_SESSION['language']);
}
if ($_SESSION['language1'] == 'english'){
	//Home general page	
	$login = 'Login';
	$logout = 'Logout';	
	$home = 'Home';
	$whereToStay = 'Where To Stay';
	$whereToGo = 'Where To Visit';
	$aboutRwanda = 'About Rwanda';
	$aboutUs = 'About Us';
	$contactUs = 'Contact Us';
	$moto = 'Tourist Attraction, Hotels, Restaurents, Travel, Deals';
	$welcome = 'Welcome to the country of a thousand hills. Enjoy...';
	$carDeals = 'Car Deals';
	$findDeal = 'Shoping';
	$mapYourWay = 'Map Your Way';
	$planYourTrip = 'Plan your trip';
	$yourTripToRwanda = 'Plan your trip to Rwanda';
	$whereAreYou = 'Where are you';
	$whereYouToGo = 'Where would you like to go';
	$upcoming = 'Upcoming';
	$accomodation = 'Accomodation';
	$tourismSites = 'Tourism sites';
	$quickSearch = 'Quick Search';
	$advancedResults = 'Advanced Results';
	$bottom = 'TorQue LTD 2012';
	$language = 'Language: English  | <a href = "javascript:void(0)" onclick = "changeLanguage()" style = "color:gold; font-size:14px; font-weight:bold">Change language</a>';
	//Hotels
	$findHotel = 'Find a Hotel';
	$enterKeyWord = 'Enter Search Keywords';
	$anyRegion = 'Any region';
	$east = 'East';
    $west = 'West';
    $south = 'South';
    $north = 'North';
    $cheap = 'Cheap';
    $class = 'High Class';
    $search = 'Search';
    $priceRange = 'Price range: From';
    $priceTo = 'To';    
    $otherHotels = 'Other hotels';
    $places = 'Places';
    $checkin = 'Check in';
    $placesToVisit = 'Places you can visit';
    $appartments = 'Appartments';
    //places
    $findPlace = 'Find a Place';
    $anyCategory = 'Any category';
    $hiking = 'Hiking';
    $camping = 'Camping';
    $waterFalls = 'Water falls';
    $birds = 'Birds';
    $otherPlaces = 'Other Places';
    $planTrip = 'Plan a trip';
    $morePlaces = 'More places';
    $nearbyAccomodation = 'Nearby Accomodation';
    $activities = 'Activities';
    $readMore = 'Read More';
    $checkBoxesToVisit = 'CHECK THE BOXES NEXT TO A PLACE YOU WANT TO VISIT';
    $allPlacesToVisit = 'ALL THE PLACES YOU WANT TO VISIT';
    $whereAreYouFrom = 'WHERE ARE YOU FROM';
    $enterLocation = "Enter your origin";
    $travelDate = 'Enter your travel date';
    //Restaurants
    $restaurants = 'Restaurants In Rwanda';
    //Tourism services
    $tourismServices = 'Tourism Services';
    $tourOperators = 'Tour Operators In Rwanda';
    $airTravel = 'Rwanda Airtravel';
    $entertainment = 'Entertainment In Rwanda';
    $rentCar = 'Rent a Car In Rwanda';
    //Rwanda Country Information
    $travelInformation = 'Rwanda Travel Information';
    $countryInformation = 'Rwanda Country Information';
    $visaRequirements = 'Visa Requirements';
    $representationAbroad = 'Rwanda Representation Abroad';
    $howToGoToRwanda = 'How To Go to Rwanda';
    $foreignEmbassies = 'Foreign Embassies and Consulates in Rwanda';
    $emmergencyPhones = 'Emmergency Phones In Rwanda';
    //About Us
    $terms = 'Terms And Conditions';
    $privacy = 'Privacy and Policy';
    $discraimer = 'Discraimer';
    //Login Page
    $loginTitle = 'Register With Rwandawindows.com';
    $registerWithUs = 'Register With us';
    $signUp = 'Sign Up';
    $openSession = 'Open Session With Rwandawindows.com';
    $password = 'Password';
    $rememberMe = 'Remember Me';
    $cancel = 'Cancel';
    $forgotPassword = 'Did you forget your password?';
    $loginMessage = 'To keep your browsing information, trip planning information and any other credentials you share with Rwanda Windows you need to be registered. ';
    //Registration
    $registrationTitle = 'If you are new, please fill in the following form';
    $firstName = 'First Name';
    $lastName = 'Last Name';
    $birthDate = 'Date of birth';
    $sex = 'Sex';
    $male = 'male';
    $female = 'Female';
    $createPassword = 'Create Password';
    $confirmPassword = 'Confirm Password';
    $apply = 'Apply';
    
    
    
    
	
}
else if ($_SESSION['language1'] == 'french'){
	//Home general page
	$login = 'Connexion';
	$logout = 'Deconnexion';
	$contLanguage = 'french';
	$home = 'Accueil';
	$whereToStay = 'Ou rester';
	$whereToGo = 'Ou visiter';
	$aboutRwanda = 'Le Rwanda';
	$aboutUs = 'Apropos de nous';
	$contactUs = 'Nous contacter';
	$moto = 'Attraction de touristes, Hotels, Restaurants, Voyages, Affaires';
	$welcome = 'Bienvenu au pays des mille collines. Enjoy...';
	$carDeals = 'Vehicules';
	$findDeal = 'Faire affaire';
	$mapYourWay = 'Tracer To Voyage';
	$planYourTrip = 'Voyager';
	$yourTripToRwanda = 'Voyager au Rwanda';
	$whereAreYou = 'Ou etes vous';
	$whereYouToGo = 'Ou voulez-vous aller';
	$upcoming = 'Bientot';
	$accomodation = 'Logements';
	$tourismSites = 'Sites tourist.';
	$quickSearch = 'Recherche rapid';
	$advancedResults = 'Resultats avances';
	$bottom = 'Rwanda Windows 2012 | Naviguer le Rwanda';
	$language = 'Langue: Francais  | <a href = "javascript:void(0)" onclick = "changeLanguage()" style = "color:gold; font-size:14px; font-weight:bold">Changer la langue</a>';
	//Hotels
	$findHotel = 'Chercher un Hotel';
	$enterKeyWord = 'Entrer un mot de recherche';
	$anyRegion = 'Toutes les regions';
	$east = 'Est';
    $west = 'Ouest';
    $south = 'Sud';
    $north = 'Nord';
    $cheap = 'Simple';
    $class = 'Classe';
    $search = 'Chercher';	
    $priceRange = 'Prix entre';
    $priceTo = 'et';
    $otherHotels = 'Autres hotels';
    $places = 'Endroits';
    $checkin = 'Reservation';
    $placesToVisit = 'Les endroits vous pouviez visiter';
    $appartments = 'Appartements';
    //places
    $findPlace = 'Chercher un endroit';
    $anyCategory = 'Toutes categories';
    $hiking = 'Hiking';
    $camping = 'Camping';
    $waterFalls = 'Chutes d\'eau';
    $birds = 'Oiseax';
    $otherPlaces = 'Autres endroits';
    $planTrip = 'Planifier le voyage';
    $morePlaces = 'Plus a visiter';
    $nearbyAccomodation = 'Hotels a proximite';
    $activities = 'Activites';
    $readMore = 'Lire Plus';
    $checkBoxesToVisit = 'COCHER LES ENDROIT DONT VOUS VOULIEZ VISITER';
    $allPlacesToVisit = 'TOUS LES ENDROITS A VISITER';
    $whereAreYouFrom = 'D\'OU ETES VOUS';
    $enterLocation = "Entrer votre origine";
    $travelDate = 'Entrer votre date de voyager';
    //Restaurants
    $restaurants = 'Restaurents Au Rwanda';
    //Tourism services
    $tourismServices = 'Services Touristiques';
    $tourOperators = 'Agences de Voyage Au Rwanda';
    $airTravel = 'Voyage de l\'air';
    $entertainment = 'Divertissement Au Rwanda';
    $rentCar = 'Louer Une Voiture Au Rwanda';
    //Rwanda Country Information
    $travelInformation = 'Information Avant le Voyage';
    $countryInformation = 'Information sur Rwanda';
    $visaRequirements = 'Obtenir Un Visa';
    $representationAbroad = 'Representation a l\'etranger';
    $howToGoToRwanda = 'Comment aller au Rwanda';
    $foreignEmbassies = 'Embassades et Consulats Au Rwanda';
    $emmergencyPhones = 'Numero d\' Urgence au Rwanda';
    //About Us
    $terms = 'Conditions Generales';
    $privacy = 'Confidentialite des donnees';
    $discraimer = 'Avertissements';
    //Login Page
    $loginTitle = 'Inscription Avec Rwandawindows.com';
    $registerWithUs = 'Inscrivez Vous';
    $signUp = 'Inscription';
    $openSession = 'Ouvrir une Session avec Rwandawindows.com';
    $password = 'Mot de passe';
    $rememberMe = 'Garder ma Session Ouverte';
    $forgotPassword = 'Avez vous oublie votre mot de passe?';
    $cancel = 'Annuler';
    $loginMessage = 'Pour conserver vos informations de navigation, information sur la planification de voyage et toutes les autres informations d\'identification que vous partagez avec le Rwanda Windows, vous devez être enregistré.';
    //Registration
    $registrationTitle = 'Si vous êtes nouveau, veiullez remplir le formulaire ci-dessous';
    $firstName = 'Nom';
    $lastName = 'Prenom';
    $birthDate = 'Date de naissance';
    $sex = 'Sexe';
    $male = 'mâle';
    $female = 'Femelle';
    $createPassword = 'Creer un mot de passe';
    $confirmPassword = 'Confirmer le mot de passe';
    $apply = 'Envoyer';
    
    
    
}
else{
	//Home general page	
	$login = 'Login';
	$logout = 'Logout';
	$home = 'Home';
	$whereToStay = 'Where To Stay';
	$whereToGo = 'Where To Visit';
	$aboutRwanda = 'About Rwanda';
	$aboutUs = 'About Us';
	$contactUs = 'Contact Us';
	$moto = 'Tourist Attraction, Hotels, Restaurents, Travel, Deals';
	$welcome = 'Welcome to the country of a thousand hills. Enjoy...';
	$carDeals = 'Car Deals';
	$findDeal = 'Shoping';
	$mapYourWay = 'Map Your Way';
	$planYourTrip = 'Plan your trip';
	$yourTripToRwanda = 'Plan your trip to Rwanda';
	$whereAreYou = 'Where are you';
	$whereYouToGo = 'Where would you like to go';
	$upcoming = 'Upcoming';
	$accomodation = 'Accomodation';
	$tourismSites = 'Tourism sites';
	$quickSearch = 'Quick Search';
	$advancedResults = 'Advanced Results';
	$bottom = 'TorQue LTD 2012';
	$language = 'Language: English  | <a href = "javascript:void(0)" onclick = "changeLanguage()" style = "color:gold; font-size:14px; font-weight:bold">Change language</a>';
	//Hotels
	$findHotel = 'Find a Hotel';
	$enterKeyWord = 'Enter Search Keywords';
	$anyRegion = 'Any region';
	$east = 'East';
    $west = 'West';
    $south = 'South';
    $north = 'North';
    $cheap = 'Cheap';
    $class = 'High Class';
    $search = 'Search';
    $priceRange = 'Price range: From';
    $priceTo = 'To';    
    $otherHotels = 'Other hotels';
    $places = 'Places';
    $checkin = 'Check in';
    $placesToVisit = 'Places you can visit';
    $appartments = 'Appartments';
    //places
    $findPlace = 'Find a Place';
    $anyCategory = 'Any category';
    $hiking = 'Hiking';
    $camping = 'Camping';
    $waterFalls = 'Water falls';
    $birds = 'Birds';
    $otherPlaces = 'Other Places';
    $planTrip = 'Plan a trip';
    $morePlaces = 'More places';
    $nearbyAccomodation = 'Nearby Accomodation';
    $activities = 'Activities';
    $readMore = 'Read More';
    $checkBoxesToVisit = 'CHECK THE BOXES NEXT TO A PLACE YOU WANT TO VISIT';
    $allPlacesToVisit = 'ALL THE PLACES YOU WANT TO VISIT';
    $whereAreYouFrom = 'WHERE ARE YOU FROM';
    $enterLocation = "Enter your origin";
    $travelDate = 'Enter your travel date';
    //Restaurants
    $restaurants = 'Restaurants In Rwanda';
    //Tourism services    
    $tourismServices = 'Tourism Services';
    $tourOperators = 'Tour Operators In Rwanda';
    $airTravel = 'Rwanda Airtravel';
    $entertainment = 'Entertainment In Rwanda';
    $rentCar = 'Rent a Car In Rwanda';
    //Rwanda Country Information
    $travelInformation = 'Rwanda Travel Information';
    $countryInformation = 'Rwanda Country Information';
    $visaRequirements = 'Visa Requirements';
    $representationAbroad = 'Rwanda Representation Abroad';
    $howToGoToRwanda = 'How To Go to Rwanda';
    $foreignEmbassies = 'Foreign Embassies and Consulates in Rwanda';
    $emmergencyPhones = 'Emmergency Phones In Rwanda';
    //About Us
    $terms = 'Terms And Conditions';
    $privacy = 'Privacy and Policy';
    $discraimer = 'Discraimer';
    //Login Page
    $loginTitle = 'Register With Rwandawindows.com';
    $registerWithUs = 'Register With us';
    $signUp = 'Sign Up';
    $openSession = 'Open Session With Rwandawindows.com';
    $password = 'Password';
    $rememberMe = 'Remember Me';
    $forgotPassword = 'Did you forget your password?';
    $cancel = 'Cancel';
    $loginMessage = 'To keep your browsing information, trip planning information and any other credentials you share with Rwanda Windows you need to be registered. ';
    //Registration
    $registrationTitle = 'If you are new, please fill in the following form';
    $firstName = 'First Name';
    $lastName = 'Last Name';
    $birthDate = 'Date of birth';
    $sex = 'Sex';
    $male = 'Male';
    $female = 'Female';
    $createPassword = 'Create Password';
    $confirmPassword = 'Confirm Password';
    $apply = 'Apply';
}

?>