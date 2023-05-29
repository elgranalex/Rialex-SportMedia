#!/bin/bash

puerto="3333"
basedatos="db-footpassion.chd3axdvsmme.eu-south-2.rds.amazonaws.com"
usuario="ec2-user"
instanciamedio="18.100.253.105"
rutaclave="clavessh-tunel-rds.pem"

nc -zv 127.0.0.1 $puerto

if [ $? -ne 0 ]
then
	echo "Conexión iniciada desde el puerto $puerto hasta $basedatos"
	ssh -i $rutaclave -L $puerto:$basedatos:3306 $usuario@$instanciamedio -N -f
else
	idproceso=$( ps aux | grep ssh | grep ec2-user | awk '{print $2}' )
	for proceso in $idproceso
	do
		kill -9 $proceso
	done
	echo "Conexión terminada"
fi

