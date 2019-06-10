#!/usr/bin/python3.5

import serial
import time
import mysql.connector

arduino = serial.Serial("/dev/ttyACM0")
arduino.baudrate = 9600


def sensors(id_plante):
    data = arduino.readline()
    time.sleep(2)
    data = arduino.readline()

    pieces = data.decode().split("\t")
    humidite = pieces[0]
    temperature = pieces[1]
    luminosite = pieces[2]

    plant_uf = mysql.connector.connect(
        host="192.168.10.200",
        user="plante",
        password="Myypoa2UaxMFtwZY",
        database="plant_uf",
    )

    curseur = plant_uf.cursor()

    curseur.execute(
        """
            UPDATE datas
            SET data_humidity=%s, data_luminosity=%s, data_temperature=%s
            WHERE uplant_id=%s
            """,
        (humidite, luminosite, temperature, id_plante),
    )

    plant_uf.commit()
    plant_uf.close()

    # Print Values for debug
    print(humidite)
    print(temperature)
    print(luminosite)


while True:
    sensors(1)
    time.sleep(1800)

