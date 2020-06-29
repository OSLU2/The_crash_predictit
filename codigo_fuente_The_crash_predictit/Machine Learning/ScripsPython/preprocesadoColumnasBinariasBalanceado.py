# -*- coding: utf-8 -*-
"""
Created on Thu Nov 14 15:20:48 2019

@author: ISAACGONZALEZGUTIERR
"""



import pandas as pd
import numpy as np
import random



#Importando el dataset
mainpath = 'C:/Users/ISAACGONZALEZGUTIERR/Documents/Personal/Proyecto Modular/datasets/atus_anual_csv/conjunto_de_datos/'
df = pd.read_csv(mainpath + 'atus_anual_2011.csv')


#Se crea un subset con las columnas a utilizar
subset = df[['ID_ENTIDAD', 'ID_MUNICIPIO', 'MES', 'ID_HORA', 'ID_DIA', 'DIASEMANA', 'URBANA', 'SUBURBANA',
             'TIPACCID', 'AUTOMOVIL', 'CAMPASAJ', 'MICROBUS', 'PASCAMION', 'OMNIBUS', 'TRANVIA',
             'CAMIONETA', 'CAMION', 'TRACTOR', 'FERROCARRI', 'MOTOCICLET', 'BICICLETA',
             'OTROVEHIC', 'CAUSAACCI', 'CAPAROD', 'SEXO', 'ALIENTO', 'CINTURON', 'ID_EDAD', 'CLASACC']].copy()


#Reemplazar las edades '99' y '0' por NAN para posteriormente eliminar esas filas
subset['ID_EDAD'].replace([0,99], [np.nan,np.nan], inplace = True)
subset['ALIENTO'].replace(['Se ignora'], [np.nan], inplace = True)
subset['CINTURON'].replace(['Se ignora'], [np.nan], inplace = True)
subset.dropna(axis=0, how ='any', inplace = True)


#Declaramos la función que convierte las columnas categóricas a columnas binarias
def createDummies(df, var_name):
    dummy = pd.get_dummies(df[var_name], prefix=var_name)
    df.drop(var_name, axis = 1, inplace = True)
    df = pd.concat([df, dummy], axis = 1)
    return df


subset = createDummies(subset, 'DIASEMANA')
subset = createDummies(subset, 'TIPACCID')    
subset = createDummies(subset, 'URBANA')
subset = createDummies(subset, 'SUBURBANA')
subset = createDummies(subset, 'CAUSAACCI')
subset = createDummies(subset, 'CAPAROD')
subset = createDummies(subset, 'SEXO')
subset = createDummies(subset, 'ALIENTO')
subset = createDummies(subset, 'CINTURON')
subset = createDummies(subset, 'MES')




#Convertimos la columna CLASACC a datos numéricos
subset['CLASACC'].replace(['No fatal', 'Sólo Daños', 'Fatal'], [0,0,1], inplace = True)

#Balanceamos el dataset con la misma cantidad de registros para cada tipo de accidente
#SIN_DANOS = subset[subset['CLASACC']  == 0 ].index
NO_FATAL = subset[subset['CLASACC']  == 0 ].index
FATAL = subset[subset['CLASACC']  == 1 ].index

#SIN_DANOS = np.random.choice(SIN_DANOS, size = len(FATAL))
random.seed(0)
NO_FATAL = np.random.choice(NO_FATAL, size = (len(FATAL)))
FATAL = np.random.choice(FATAL, size = len(FATAL))

#new_indexes = np.concatenate((SIN_DANOS, NO_FATAL, FATAL))
new_indexes = np.concatenate((NO_FATAL, FATAL))



subset = subset.loc[new_indexes, ]


#Creamos la cabecera con los nombres de las nuevas columnas
cabecera = ['ID_ENTIDAD','ID_MUNICIPIO', 'ID_HORA','ID_DIA','AUTOMOVIL','CAMPASAJ',
 'MICROBUS','PASCAMION','OMNIBUS','TRANVIA','CAMIONETA','CAMION','TRACTOR','FERROCARRI',
 'MOTOCICLET','BICICLETA','OTROVEHIC','ID_EDAD','CLASACC','DIASEMANA_Domingo','DIASEMANA_Jueves',
 'DIASEMANA_Lunes','DIASEMANA_Martes','DIASEMANA_Miercoles','DIASEMANA_Sabado','DIASEMANA_Viernes',
 'TIPACCID_Caida de pasajero','TIPACCID_Colision con animal','TIPACCID_Colision con ferrocarril',
 'TIPACCID_Colision con objeto fijo','TIPACCID_Colision con peaton (atropellamiento)',
 'TIPACCID_Colision con vehiculo automotor','TIPACCID_Colision con vehiculo automotor0',
 'TIPACCID_Colision con vehiculo automotor1','TIPACCID_Colision con vehiculo automotor2',
 'TIPACCID_Incendio','TIPACCID_Salida del camino','TIPACCID_Volcadura','URBANA_Accidente en interseccion',
 'URBANA_Accidente en no interseccion','URBANA_Sin accidente en esta zona','SUBURBANA_Accidente en camino rural',
 'SUBURBANA_Accidente en carretera estatal','SUBURBANA_Accidentes en otro camino',
 'SUBURBANA_Sin accidente en esta zona','CAUSAACCI_Conductor','CAUSAACCI_Falla del vehiculo',
 'CAUSAACCI_Mala condicion del camino','CAUSAACCI_Otra','CAUSAACCI_Peaton o pasajero',
 'CAPAROD_No Pavimentada','CAPAROD_Pavimentada','SEXO_Hombre','SEXO_Mujer','ALIENTO_No',
 'ALIENTO_Si','CINTURON_No','CINTURON_Si','MES_1', 'MES_2', 'MES_3',
 'MES_4', 'MES_5', 'MES_6', 'MES_7', 'MES_8','MES_9', 'MES_10', 'MES_11',
 'MES_12']


#Exportamos el nuevo dataset
subset.to_csv(mainpath + 'subset_atus_anual_2011_binario_balanceado_2class_AllFeatures_Mes.csv', header = cabecera, index= False)


subset['CLASACC'].value_counts()


