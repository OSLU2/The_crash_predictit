# -*- coding: utf-8 -*-
"""
Created on Sun Nov  3 04:39:51 2019

@author: ISAACGONZALEZGUTIERR
"""

import pandas as pd
import matplotlib.pyplot as plt
import numpy as np
import seaborn as sns
from sklearn.model_selection import train_test_split
from sklearn.ensemble import RandomForestClassifier
from sklearn.metrics import  confusion_matrix, classification_report
from helper_plot import plotValidationCurves
from sklearn.model_selection import GridSearchCV
from sklearn.metrics import accuracy_score, f1_score, precision_score, recall_score
from sklearn.utils import shuffle



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



#Separamos el dataset en entrenamietno y prueba

#Asignar Variables con Shuffle
X_train, y_train = shuffle(X,y, random_state = 0)

"""
X_train, X_test, y_train, y_test = train_test_split(X,y, test_size=0.01, 
                                                    random_state=42)

"""
X_train_val, X_test_val, y_train_val, y_test_val = train_test_split(X_val,
                                                                    y_val,
                                                                    test_size=0.99, 
                                                                    random_state=42)


########################### RANDOM FOREST ##########################

model = RandomForestClassifier(n_estimators=500,
                               n_jobs = 2,
                               criterion = 'entropy',
                               max_depth = 20,
                               oob_score = True,
                               min_samples_split = 2,
                               min_samples_leaf = 1,
                               max_features = 12,
                               random_state=0)


"""
#param_range = [100, 300, 500, 1000]
#param_range = [5, 6, 8, 10, 12, 14, 16, 18, 20]
#param_range = [5, 10, 15, 20, 25, 30, 35,40]
param_range = [3,4,5,6,7,8,9,10,11,12,15]

plotValidationCurves(model = model, X = X_train,
                     y = y_train,
                     param_name = 'max_features',
                     param_range = param_range)



param_grid = {
            'max_features': [3,4,5,6,7,8,9,10,11,12,15]
        }

model = GridSearchCV(clf,
                     param_grid, verbose = 1,
                     n_jobs = -1)

"""

model.fit(X_train,y_train)


#print('\nMejores parámetros: \n', model.best_params_)

score_Train = model.score(X_train, y_train)
score_Test = model.score(X_test_val, y_test_val)

ytrain_pred = model.predict(X_train)
ytest_pred = model.predict(X_test_val)

#accuracy_score(y_test_val, ytest_pred)
#precision_score(y_test_val, ytest_pred)
#recall_score(y_test_val, ytest_pred)
#f1_score(y_test_val, ytest_pred)

print('\n------------------------------------------------------------')
print('\nScore train Random Forest: {0: .5f}'.format(score_Train))
print('Score test Random Forest: {0: .5f}'.format(score_Test))

print('\n------------------------------------------------------------')
print('Clasification report')
print(classification_report(y_test_val,ytest_pred))

print('\n------------------------------------------------------------')
print('Matriz de confusión: \n')
cm = confusion_matrix(y_test_val, ytest_pred)
target_names = ['No_fatal', 'Fatal']
print(cm)


plt.figure(figsize=(18, 15))
b, t = plt.ylim()
b += 20
t -= 20
plt.ylim(b, t)
sns.set(font_scale=1.4)
sns.heatmap(cm, annot = True, square = True,
            linewidths=0.2,
            xticklabels = target_names,
            yticklabels = target_names,
            robust = False,
            cbar_kws = {'shrink': 0.5},
            fmt="d")





"""

pd.concat([pd.DataFrame(df.drop(columns = names).columns, columns = ['features']),
           pd.DataFrame(np.transpose(model.feature_importances_ * 1000),
           columns = ['coef'])], axis = 1)


"""