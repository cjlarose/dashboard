CREATE OR REPLACE PROCEDURE SP_COUNT_CONSUMER_ACCESS_TOKEN
(
P_CONSUMER_KEY    IN        VARCHAR2,
P_COUNT           OUT        NUMBER,
P_RESULT          OUT       NUMBER
)
AS
-- PROCEDURE TO Count the consumer access tokens for the given consumer.
BEGIN
P_RESULT := 0;

SELECT COUNT(OST_ID) INTO P_COUNT
  FROM OAUTH_SERVER_TOKEN
  JOIN OAUTH_SERVER_REGISTRY
  ON OST_OSR_ID_REF = OSR_ID
  WHERE OST_TOKEN_TYPE   = 'ACCESS'
  AND OSR_CONSUMER_KEY = P_CONSUMER_KEY
  AND OST_TOKEN_TTL    >= SYSDATE;
              

EXCEPTION
WHEN OTHERS THEN
-- CALL THE FUNCTION TO LOG ERRORS
ROLLBACK;
P_RESULT := 1; -- ERROR
END;
/
