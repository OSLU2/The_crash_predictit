# -*- coding: utf-8 -*-
"""
Created on Mon Nov 18 19:42:53 2019

@author: ISAACGONZALEZGUTIERR
"""

import numpy as np
import pandas as pd
import seaborn as sn
from sklearn.preprocessing import StandardScaler, RobustScaler, PolynomialFeatures
from sklearn.model_selection import train_test_split
from sklearn.neural_network import MLPClassifier
from sklearn.metrics import  confusion_matrix, classification_report
import matplotlib.pyplot as plt
from sklearn.model_selection import GridSearchCV



#Importamos los datos
mainpath = 'C:/Users/ISAACGONZALEZGUTIERR/Documents/Personal/Proyecto Modular/datasets/'
df = pd.read_csv(mainpath + 'subset_atus_anual_2011-17_binario_balanceado_2class_AllFeatures_Mes.csv')
df_val = pd.read_csv(mainpath + 'subset_atus_anual_2011-17_binario_2class_validacion_Mes.csv')

#Elegimos la variable a predecir
target = 'CLASACC'


#Columnas a eliminar
names = ['CLASACC', 'TRANVIA', 'FERROCARRI',
         'TIPACCID_Colision con vehiculo automotor2',
         'URBANA_Sin accidente en esta zona',
         'SUBURBANA_Sin accidente en esta zona',
         'MICROBUS',
         'OMNIBUS',
         'TIPACCID_Caida de pasajero',
         'TIPACCID_Colision con animal',
         'TIPACCID_Incendio',
         'CAUSAACCI_Falla del vehiculo',
         'CAUSAACCI_Otra',
         'CAPAROD_No Pavimentada',
         'SEXO_Mujer',
         'ALIENTO_No',
         'CINTURON_No',
         'TIPACCID_Colision con ferrocarril']


#Asignamos la variables predictoras y el target a arreglos de numpy
X = np.array(df.drop(columns = names))
y = np.array(df[target], dtype = np.int8)

X_val = np.array(df_val.drop(columns = names))
y_val = np.array(df_val[target], dtype = np.int8)


#Escalamos los datos con la clase StandardScaler
sc_X = StandardScaler()
sc_X.fit(X)
X_ = sc_X.transform(X)


#Separamos el dataset en entrenamietno y prueba
X_train, X_test, y_train, y_test = train_test_split(X,y, test_size=0.30, 
                                                    random_state=42)

X_train_val, X_test_val, y_train_val, y_test_val = train_test_split(X_val,
                                                                    y_val,
                                                                    test_size=0.50, 
                                                                    random_state=42)


#Declaramos nuestro modelo de Red Neuronal
mlp = MLPClassifier(activation = 'logistic',
                      max_iter = 1000,
                      batch_size = 100,
                      alpha = 0.0005,
                      learning_rate = 'constant',
                      learning_rate_init = 0.001,
                      solver = 'adam',
                      random_state = 0)




########## Realizamos la búsqueda de los mejores hiperparámetros con GridSearchCV
"""
param_grid = {
            #'alpha': [0.0001, 0.0005, 0.001, 0.005, 0.01, 0.1],
            #'learning_rate' : ['constant', 'invscaling', 'adaptive'],
            'learning_rate_init': [0.0001, 0.0005, 0.001, 0.005, 0.01, 0.1],
            #'activation': ['tanh', 'logistic']
        }

model = GridSearchCV(mlp, param_grid)

model.fit(X_train, y_train)

print('\nBest param: ', model.best_params_)
"""

#########################################################

model = mlp
model.fit(X_train, y_train)

print('\n\n----------- MLP --------------\n')
print("Train: ", model.score(X_train,y_train))
print("Test: ", model.score(X_test_val,y_test_val))

ytest_pred = model.predict(X_test_val)

print('\n------------------------------------------------------------')
print('Clasification report')
print(classification_report(y_test_val,ytest_pred))

print('\n------------------------------------------------------------')
print('Matriz de confusión: \n')


cm = confusion_matrix(y_test_val, ytest_pred)
target_names = ['No_fatal', 'Fatal']
print(cm)

plt.figure()
sn.heatmap(cm, annot = True, square = True, xticklabels = target_names,
            yticklabels = target_names, robust = False, cbar_kws = {'shrink': 0.5},
            fmt="d")
