import React, { useState } from 'react';

const UrlForm = ({postFunction}) => {
  const [url, setUrl] = useState('');
  const [shortenedUrl, setShortenedUrl] = useState(null);

  const handleSubmit = async (e) => {
    e.preventDefault();
    try {
      const response = await postFunction('/shorten', { 'original_url': url });
      setShortenedUrl(response);
    } catch (error) {
      setShortenedUrl('Failed to shorten URL, try again later');
    }
  };

  return (
    <div>
      <form onSubmit={handleSubmit}>
        <input
          type="url"
          value={url} 
          onChange={(e) => setUrl(e.target.value)}
          placeholder="Enter URL"
          required
        />
        <button type="submit">Shorten</button>
      </form>
      {shortenedUrl && <p>Shortened URL: <a href={shortenedUrl}>{shortenedUrl}</a></p>}
    </div>
  );
};

export default UrlForm;