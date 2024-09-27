import axios from 'axios';

export const postData = async (path, data) => {
  console.log('enters here')
  try {
    const response = await axios.post(process.env.REACT_APP_API_URL+path, data);
    return response.data;
  } catch (error) {
    console.error("Error during post request:", error);
    throw error;
  }
};

export const getData = async (path) => {
  console.log('enters here')
  try {
    const response = await axios.get(process.env.REACT_APP_API_URL+path);
    return response.data;
  } catch (error) {
    console.error("Error during post request:", error);
    throw error;
  }
};
