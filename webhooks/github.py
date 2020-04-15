import argparse
parser = argparse.ArgumentParser()
parser.add_argument('body')
args = parser.parse_args()
print(args.body)
