// Code pour récupérer les valeurs des capteurs

float Vout, RLDR, luminosite, temperature, humidite;
int serial_hum, serial_temp, serial_lum, volt_hum, volt_temp;

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

  // Humidité
  volt_hum = serial_hum * 5.0;
  volt_hum /= 1023.0;

  // Voltage Température
  volt_temp = serial_temp * 5.0;
  volt_temp /= 1023.0;

  // Calcul luminosité
  Vout = (serial_lum * 0.0048828125);   // [Vout = ADC * (Vin / 1024)]
  RLDR = (10000.0 * (5 - Vout)) / Vout; // [R-LDR =(R1 (Vin - Vout))/ Vout]

  //Valeurs cohérentes

  // Humidité
  humidite = (100 - (volt_hum * 100));
  // Température
  temperature = (volt_temp - 0.5) * 100;
  // Luminosité
  luminosite = (500 / RLDR);

  // Envoi les mesure à la raspberry pour affichage et attends 250ms
  Serial.print(humidite);
  Serial.print("\t");
  Serial.print(temperature);
  Serial.print("\t");
  Serial.print(luminosite);
  Serial.print("\n");
  delay(2000);
}
