import React, { useState } from 'react';
import { useParams } from 'react-router-dom';

const Redirect = ({ getFunction }) => {
  const [url, setUrl] = useState('');
  const { slug } = useParams();
  getFunction('/shorten/' + slug).then(data => setUrl(data));

  if (url)
    window.location.href = url

  return (
    <div>
      You are being redirected to: {url}
    </div>
  );
};

export default Redirect;