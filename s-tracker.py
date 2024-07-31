import sys
import pandas as pd
from sklearn.linear_model import LinearRegression

# Load the data into a Pandas dataframe
data = pd.read_csv("PredictionData.csv")

# Split the data into training and testing sets
X_train = data[["attendance", "internal", "t_rating", "p_rating"]]
y_train = data["final_marks"]

# Create a linear regression model and fit it to the training data
model = LinearRegression()
model.fit(X_train, y_train)

# Read the command-line arguments for feature values
attendance = float(sys.argv[1])
internal = float(sys.argv[2])
t_rating = float(sys.argv[3])
p_rating = float(sys.argv[4])

# Make predictions on new data
X_new = pd.DataFrame([[attendance, internal, t_rating, p_rating]], columns=["attendance", "internal", "t_rating", "p_rating"])
y_pred = model.predict(X_new)

print(y_pred[0])  # Prints the predicted final marks for the new data
