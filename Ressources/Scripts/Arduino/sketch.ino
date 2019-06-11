// Code pour récupérer les valeurs des capteurs
float volt_hum, volt_temp, Vout, Rlum, serial_hum, serial_temp, serial_lum;

// Fonction setup(), appelée au démarrage de la carte Arduino
void setup()
{
  // Initialise la communication avec la raspberry
  Serial.begin(9600);
}

// Fonction loop() pour récupérer les valeurs en permanence
void loop()
{
  // Mesure la tension sur la broche A0 Humidité
  serial_hum = analogRead(A0);

  // Mesure la tension sur la broche A2 Températures
  serial_temp = analogRead(A2);

  // Mesure la tension sur la broche A4 Luminosité
  serial_lum = analogRead(A4);

  // Voltage Température
  volt_temp = (serial_temp * 5.0) / 1023.0;

  // Calcul luminosité
  Vout = (serial_lum * (5.0 / 1023.0));   // [Vout = ADC * (Vin / 1023)]
  Rlum = (10000.0 * (5.0 - Vout)) / Vout; // [R-LDR =(R1 (Vin - Vout))/ Vout]

  //Valeurs cohérentes
  // Humidité
  int humidite = serial_hum;

  // Température
  int temperature = (volt_temp - 0.5) * 100;

  // Luminosité
  int luminosite = (500 / Rlum);

  // Envoi les mesure à la raspberry pour affichage et attends 250ms
  Serial.print(humidite);
  Serial.print("\t");
  Serial.print(temperature);
  Serial.print("\t");
  Serial.print(luminosite);
  Serial.print("\n");
  delay(200);
}
