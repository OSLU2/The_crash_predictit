# -*- coding: utf-8 -*-
"""
Created on Sat Nov  2 21:50:19 2019

@author: ISAACGONZALEZGUTIERR
"""

import pandas as pd
import matplotlib.pyplot as plt
import numpy as np
import seaborn as sn
from sklearn.model_selection import train_test_split
from sklearn.linear_model import LogisticRegression
from sklearn.metrics import  confusion_matrix, classification_report, f1_score
from sklearn.preprocessing import StandardScaler
from sklearn.model_selection import GridSearchCV
from helper_plot import plotValidationCurves





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


#Escalamos los datos
sc_X = StandardScaler()
sc_X.fit(X)
X_ = sc_X.transform(X)


#Separamos el dataset en entrenamietno y prueba
X_train, X_test, y_train, y_test = train_test_split(X,
                                                    y,
                                                    test_size=0.2, 
                                                    random_state=0)

X_train_val, X_test_val, y_train_val, y_test_val = train_test_split(X_val,
                                                                    y_val,
                                                                    test_size=0.10, 
                                                                    random_state=42)


#Declaramos el modelo
logReg = LogisticRegression(solver='lbfgs',
                               max_iter = 1000,
                               C = 0.02,
                               random_state = 0)


################## Búsqueda de Hiperparámetros con GridSearchCV ##################
"""
param_grid = {
            'C': [0.01, 0.02, 0.05, 0.1, 0.5, 1.0, 5, 10],
            'solver': ['lbfgs', 'newton-cg', 'saga', 'sag']
        }

model = GridSearchCV(logReg, param_grid)
model.fit(X_train, y_train)
print('\nBest param: ', model.best_params_)
"""


############ Curvas de Validación ###########################


param_range = [0.01, 0.02, 0.05, 0.1, 0.5, 1.0, 5, 10]

plotValidationCurves(model = logReg, X = X_train,
                     y = y_train,
                     param_name = 'C',
                     param_range = param_range)




###################################################################


#Entrenamos el modelo con los datos entrenamiento
model = logReg
model.fit(X_train, y_train)

#Calculamos los socore
ScoreTrain = model.score(X_train, y_train)
ScoreTest = model.score(X_test, y_test)

#Realizamos predicciones
ytrain_pred = model.predict(X_train)
ytest_pred = model.predict(X_test)

print('\n------------------------------------------------------------')
print('\nScore train Regresión logística: {0: .5f}'.format(ScoreTrain))
print('Score test Regresión logística: {0: .5f}'.format(ScoreTest))

print('\n------------------------------------------------------------')
print('Clasification report\n')
print(classification_report(y_test,ytest_pred))

print('\n------------------------------------------------------------')
cm = confusion_matrix(y_test, ytest_pred)
target_names = ['No_fatal', 'Fatal']
print(cm)

plt.figure()
sn.heatmap(cm, annot = True, square = True, xticklabels = target_names,
            yticklabels = target_names, robust = False, cbar_kws = {'shrink': 0.5},
            fmt="d")









