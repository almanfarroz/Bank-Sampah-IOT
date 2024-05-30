#include <WiFi.h>
#include <HTTPClient.h>
#include "HX711.h"

const int pinDOUT = 4;
const int pinSCK = 2;
#define BUZZER_PIN 13
HX711 scale;

float kg;
const char* ssid = "Ihsan";
const char* password = "qwertyuiop";
const char* server = "172.20.10.6";  // Replace with your local computer's IP address
const int httpPort = 80;  // Port used by Apache

void connectToWiFi() {
   Serial.print("Connecting to WiFi...");
   WiFi.begin(ssid, password);
   while (WiFi.status() != WL_CONNECTED) {
     delay(500);
     Serial.print(".");
   }
   Serial.println("");
   Serial.println("WiFi connected");
   Serial.print("IP address: ");
   Serial.println(WiFi.localIP());
}

void setup() {
  Serial.begin(115200);
  scale.begin(pinDOUT, pinSCK);
  scale.set_scale(0.42);
  scale.tare();
  connectToWiFi();

  pinMode(BUZZER_PIN, OUTPUT);
  digitalWrite(BUZZER_PIN, LOW);
  noTone(33);
}

void loop() {
  if (WiFi.status() != WL_CONNECTED) {
     Serial.println("WiFi disconnected! Trying to reconnect...");
     connectToWiFi();
   }

  if (scale.is_ready()) {
    long reading = scale.get_units(3);
    kg = float(reading) / 10000;

    // Check for negative values and handle them
    if (kg < 0) {
      Serial.println("Error: Negative weight value detected");
      kg = 0;  // Set kg to 0 or handle as appropriate
    }

    Serial.print("Weight: ");
    Serial.print(kg, 2);
    Serial.println(" kg");

    float threshold = 3.00;
    if (kg > threshold){
      digitalWrite(BUZZER_PIN, HIGH);
      tone(33, 50, 100);
      Serial.println("Weight exceeds the threshold");
    } else {
      digitalWrite(BUZZER_PIN, LOW);
      noTone(33);
    }

    // Send sensor data
    WiFiClient wClient;

    if (!wClient.connect(server, httpPort)) {
      Serial.println("Failed to connect to the web server");
      delay(100);  // Wait 10 seconds before trying again
      return;
    }

    String url = "http://" + String(server) + "/BankSampah/BankSampah/public/simpan/" + String(kg);

    HTTPClient http;
    http.begin(wClient, url);
    int httpResponseCode = http.GET();

    if (httpResponseCode > 0) {
      String response = http.getString();
      Serial.println(httpResponseCode);
      Serial.println(response);
    } else {
      Serial.print("Error on sending GET: ");
      Serial.println(httpResponseCode);
    }

    http.end();
    delay(1000); 
  }
}
