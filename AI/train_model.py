import os
import kagglehub
import pandas as pd
from dotenv import load_dotenv

# Load environment variables from .env file in the current directory
load_dotenv()

# Download dataset
path = kagglehub.dataset_download("abhi8923shriv/sentiment-analysis-dataset")

print("Path to dataset files:", path)

# List files in that directory to see downloaded files
files = os.listdir(path)

print("Files in dataset directory:", files)

# Loading CSV
csv_path = os.path.join(path, "test.csv")
df = pd.read_csv(csv_path)
print(df.head())