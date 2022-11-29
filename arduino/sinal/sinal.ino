int led = 13;
int a = A0;
int b = A1;
void setup() {
  pinMode(led, OUTPUT);
  pinMode(a, OUTPUT);
  digitalWrite(a, HIGH);
  pinMode(b, OUTPUT);
  digitalWrite(b, HIGH);
  Serial.begin(9600);
}

/**
 * Função que lê uma string da Serial
 * e retorna-a
 */
String leStringSerial() {
  String conteudo = "";
  char caractere;

  // Enquanto receber algo pela serial
  while (Serial.available() > 0) {
    // Lê byte da serial
    caractere = Serial.read();
    // Ignora caractere de quebra de linha
    if (caractere != '\n') {
      // Concatena valores
      conteudo.concat(caractere);
    }
    // Aguarda buffer serial ler próximo caractere
    delay(10);
  }

  //Serial.print("Recebi: ");
  //Serial.println(conteudo);

  return conteudo;
}

void loop() {
  // Se receber algo pela serial
  if (Serial.available() > 0) {
    // Lê toda string recebida
    String recebido = leStringSerial();

    if (recebido == "LED1:1") {
      digitalWrite(led, HIGH);
      digitalWrite(a, LOW);
      delay(750);
      digitalWrite(led, LOW);
      digitalWrite(a, HIGH);
    }

    if (recebido == "LED1:0") {
      digitalWrite(led, HIGH);
      digitalWrite(b, LOW);
      delay(750);
      digitalWrite(led, LOW);
      digitalWrite(b, HIGH);
      delay(50);
      digitalWrite(led, HIGH);

      delay(50);
      digitalWrite(led, LOW);
    }

    if (recebido == "LED1:3") {
      int status = !digitalRead(a);

      digitalWrite(a, status);
    }
  }
}